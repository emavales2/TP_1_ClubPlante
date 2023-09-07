
<?php

require_once('Crud.php');
//echo "<link rel='stylesheet' type='text/css' href='../css/styles.css'>";

class Member extends Crud {

    public function __construct() {
        
        // -------- CONSTRUCTEUR pour utiliser le constructeur de Crud.php --------
        parent::__construct();
    }

    // -------- CRÉER MEMBRE --------
    public function createMember($data) {
        // Nécessaire car city_id est une FK
        $city_id = $data['city_id'];

        // Appelle la fonction 'create' dans la classe Crud
        return $this->create('member', $data);
    }


    // -------- MONTRER LISTE DE MEMBRES --------
    public function allMembers() {
        // Appelle la fonction 'showAll' dans la classe Crud
        return $this->showAll('member');
    }


    // -------- MONTRER LE MEMBRE CIBLÉ --------
    public function oneMember($id) {
        
        // Appelle la fonction 'showOneId' dans la classe Crud
        return $this->showOneId('member', $id);
    }


    // -------- OBTENIR CITY NAME --------
    public function getCityName($id) {
        $sql = "SELECT City.name
                FROM Member AS Member
                LEFT JOIN city AS City ON Member.City_Id = City.id
                WHERE Member.id = :id";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
    }


    // -------- FAIRE UN UPDATE SUR UNE COMPTE MEMBRE EXISTANTE --------
    public function updateMember($data) {
        // var_dump($data);
        // echo "<br>";

        // Appelle la fonction 'update' dans la classe Crud et le met dans une variable
        $update = $this->update('member', $data);

        if ($update) {
            $id = $data['id'];
            header("Location: member_show.php?id=$id");
            exit;

        } else {
            echo "Mise à jour pas effectuée. SVP d'essayer à nouveau.";
        }
    }


    // -------- ÉLIMINER UNE COMPTE MEMBRE MEMBRE EXISTANTE --------
    public function deleteMember($id) {  //antes $data
        // Appelle la fonction 'delete' dans la classe Crud
        return $this->delete('member', $id, 'id'); //antes $data
    }
}


?>