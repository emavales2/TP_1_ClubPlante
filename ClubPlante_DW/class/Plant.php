
<?php

require_once('Crud.php');

class Plant extends Crud {

    public function __construct() {
        
        // -------- CONSTRUCTEUR pour utiliser le constructeur de Crud.php --------
        parent::__construct();
    }

    // -------- CRÉER PLANTE --------
    public function createPlant($data) {
        // Nécessaire car city_id est une FK
        //$city_id = $data['city_id'];

        // Appelle la fonction 'create' dans la classe Crud
        return $this->create('plant', $data);
    }


    // -------- MONTRER LISTE DE PLANTES --------
    public function allPlants() {
        // Appelle la fonction 'showAll' dans la classe Crud
        return $this->showAll('plant');
    }


    // -------- MONTRER LE PLANTE CIBLÉ --------
    public function onePlant($id) {
        
        // Appelle la fonction 'showOneId' dans la classe Crud
        return $this->showOneId('plant', $id);
    }


    // -------- FAIRE UN UPDATE SUR UNE PLANTE EXISTANTE --------
    public function updatePlant($data) {
        // var_dump($data);
        // echo "<br>";

        // Appelle la fonction 'update' dans la classe Crud et le met dans une variable
        $update = $this->update('plant', $data);

        if ($update) {
            $id = $data['id'];
            header("Location: plant_show.php?id=$id");

        } else {
            echo "Mise à jour pas effectuée. SVP d'essayer à nouveau.";
        }  
    }


    // -------- ÉLIMINER UNE PLANTE EXISTANTE --------
    public function deletePlant($id) {  //antes $data
        // Appelle la fonction 'delete' dans la classe Crud
        return $this->delete('plant', $id, 'id'); //antes $data
    }
}


?>