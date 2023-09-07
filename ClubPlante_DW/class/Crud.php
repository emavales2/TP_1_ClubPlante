
<?php

class Crud extends PDO {

    // -------- CONSTRUCTEUR pour faire la connection à la db --------
    public function __construct() {
        
        // WEBDEV
        parent::__construct('mysql:host=localhost; dbname=e2395411; port=3306; charset=utf8', 'e2395411', 'iLPd9vZnaB90nGRPfXXT');
        
        // MY LOCAL ONE
        //parent::__construct('mysql:host=localhost; dbname=clubPlante; port=3306; charset=utf8', 'root', '');
    }


    // -------- CRÉER NOUV. INSTANCE (par ex. creer un nouveau membre) --------
    public function create($table, $data) {
        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue)";

        // return $sql;

        $stmt = $this->prepare($sql);

        foreach ($data as $key=>$value) {
            $stmt->bindValue(":$key", $value);
        }

        if ($stmt->execute()) {
            // Nous donne l'id du dernier membre crée. 'lastInsertId' est native à php donc on ne peut pas changer le nom de la fonction
            return $this->lastInsertId();
        } else {
            print_r ($stmt->errorInfo());
        }
    }


    // -------- MONTRER LISTE CIBLÉE --------
    // --- Selectionne toutes les entrées dans la table choisie, et les retourne dans un tableau, triées en base au champ choisi (dans ce cas, on a comme default le champ "id"), dans l'ordre choisi (ascendent).  ---
    public function showAll($table, $field = 'id', $order = 'ASC') {

        // ------ si la table est membre, on va avoir besoin de chercher city name dans la table city -----
        if ($table === 'member') {
            $sql = "SELECT Member.*, City.name AS city_name
                    FROM $table AS Member
                    LEFT JOIN City ON Member.City_Id = City.id
                    ORDER BY $field $order";
        
        // Sinon, on fait le select sans le join
        } else {
            $sql = "SELECT * FROM $table ORDER BY $field $order";
        }
               
        $stmt = $this->query($sql);
        
        return $stmt->fetchAll();
    }


    // -------- MONTRER LE MEMBRE CIBLÉ --------
    // --- Selectionne une entrée particulière dans la table choisie en base au champ choisi (ici le default est "id") et sa valeur. Le param $url renvoit ailleurs si la cible n'est pas trouvée. ---
    public function showOneId($table, $value, $field = 'id', $url = null) { //'member_index'
        
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        //SELECT * FROM member WHERE id = :id
        //return $sql;

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value); //:id = $value                        
        $stmt->execute();

        // -------- $stmt doit nous retourner UNE donnée en particulier (id is PK), donc si le résultat est plus qu'une row, le crud nos envoit ailleurs (location) --------
        $count = $stmt->rowCount();
        
        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location:$url.php");
            exit;
        }   
    }


    // -------- FAIRE UN UPDATE SUR UNE ENTRÉE EXISTANTE (ex. membre et ses données) --------
    // --- Cible l'entrée avec une clé/valeur spécifique (in this case $field = 'id') ---
    public function update($table, $data, $field = 'id') {

        $fieldName = null;
        
        foreach ($data as $key=>$value) {
            $fieldName .= "$key = :$key, ";
        }

        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field";
        
        //return $sql;

        $stmt = $this->prepare($sql);
        
        foreach ($data as $key=>$value) {
            $stmt->bindValue(":$key", $value);
        }

        // -------- Si l'update a été fait avec succès, le crud t'envoit vers la referrer page (la page dont l'usager était avant d'arriver ici - dans ce crud en particulière on veut être envoyé vers member_edit.php), sinon, ell affiche un msg erreur --------
        if ($stmt->execute()) {
            //header('Location: ' . $_SERVER['HTTP_REFERER']); 
            return true;
            // RN IT BRINGS ME TO THE GENERAL SHOW PG, WHYYY???
            //header('Location: {$table}_show.php?id=$id');
        } else {
            //print_r ($stmt->errorInfo());
            return false;
        }
    }


    // -------- ÉLIMINER UNE ENTRÉE EXISTANTE ex. membre et ses données) --------
    // --- Cible l'entrée avec une clé/valeur spécifique (in this case $field = 'id') ---
    public function delete($table, $value, $url, $field='id') { 
        
        $sql = "DELETE FROM $table WHERE $field = :$field"; 
        //return $sql;
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        
        // -------- Si le delete a été fait avec succès, le crud t'envoit vers la referrer page (dans ce crud en particulière on veut être envoyé vers member_edit.php), sinon, ell affiche un msg erreur --------
        if ($stmt->execute()) {
            header("location:$url.php");
        } else {
            print_r ($stmt->errorInfo());
        }   
    }

}

// -------- À NOTER : Dans le schema clubPlante, cibler les données sur la base cle/valeur $field = 'id' fonctionne sur toutes les tables, et peut se faire sur la classe Crud (au contraire d'avoir une méthode spécifique dans chaque classe), pcq TOUTES les PKs s'appellent 'id' (pas memberId etc). --------

?>