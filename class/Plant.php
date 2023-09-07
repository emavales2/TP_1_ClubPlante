
<?php

require_once('Crud.php');

class Plant extends Crud {

    public function __construct() {
        
        // -------- CONSTRUCTEUR pour utiliser le constructeur de Crud.php --------
        parent::__construct();
    }

    // -------- CRÉER MEMBRE --------
    public function createPlant($data) {
        // Nécessaire car city_id est une FK
        //$city_id = $data['city_id'];

        // Appelle la fonction 'create' dans la classe Crud
        return $this->create('plant', $data);
    }


    // -------- MONTRER LISTE DE MEMBRES --------
    public function allPlants() {
        // Appelle la fonction 'showAll' dans la classe Crud
        return $this->showAll('plant');
    }


    // -------- MONTRER LE MEMBRE CIBLÉ --------
    public function onePlant($id) {
        
        // Appelle la fonction 'showOneId' dans la classe Crud
        return $this->showOneId('plant', $id);
    }


    // -------- OBTENIR CITY NAME --------
    // public function getCityName($id) {
    //     $sql = "SELECT City.name
    //             FROM Member AS Member
    //             LEFT JOIN city AS City ON Member.City_Id = City.id
    //             WHERE Member.id = :id";

    //     $stmt = $this->prepare($sql);
    //     $stmt->bindValue(':id', $id);
    //     $stmt->execute();

    //     return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
    // }


    // -------- FAIRE UN UPDATE SUR UNE COMPTE MEMBRE EXISTANTE --------
    public function updatePlant($data) {
        var_dump($data);
        echo "<br>";

        // Appelle la fonction 'update' dans la classe Crud et le met dans une variable
        $update = $this->update('plant', $data);

        if ($update) {
            $id = $data['id'];
            header('Location: plant_show.php?id=$id');

        } else {
            echo "Mise à jour pas effectuée. SVP d'essayer à nouveau.";
        }  
    }


    // -------- ÉLIMINER UNE COMPTE MEMBRE MEMBRE EXISTANTE --------
    public function deletePlant($id) {  //antes $data
        // Appelle la fonction 'delete' dans la classe Crud
        return $this->delete('plant', $id, 'id'); //antes $data
    }
}


?>