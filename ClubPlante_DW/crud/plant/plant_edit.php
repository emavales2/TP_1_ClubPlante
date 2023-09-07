<?php

// CHECKING CONNECTION ---------------------------------------------------------

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


// try {
//     $db = new PDO('mysql:host=localhost;dbname=e2395411;charset=utf8', 'e2395411', 'iLPd9vZnaB90nGRPfXXT');
//     echo 'Connected to the database successfully!';
// } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
// }

// ------------------------------------------------------------------------------


require_once('../../class/Plant.php');
include('../../head.php');

if (!isset($_GET['id']) || $_GET['id'] == null){
    header('location:plant_index.php');
    exit;
} else {

    $id =  $_GET['id'];    

    $plant = new Plant;
    $onePlant = $plant->onePlant($id);

    extract($onePlant);
}


// Si le formulaire a été bien envoyé...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $update = $plant->updatePlant($_POST);

    // Pour envoyer vers member_show mise à jour si l'update est fait avec succes
    if ($update) {
        
        $id = $_POST['id'];

        header("Location: plant_show.php?id=$id");
        exit;

    } else {   
        echo "Mise à jour pas efectuée. SVP d'essayer à nouveau";
    }
}

?>


    <h2>Mise à Jour</h2>

    <form action="plant_update.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        
        <label>Nom
            <input type="text" name="name" value="<?= $name; ?>">
        </label>

        <label>Type
            <input type="text" name="type" value="<?= $type; ?>">
        </label>
        
        <label>Description
            <textarea name="description" rows="6" cols="40" value="<?= $description; ?>"> 
            </textarea>
        </label>

        <label>Soins
            <textarea name="care" rows="6" cols="40" value="<?= $care; ?>"> 
            </textarea>
        </label>

        <!-- <label>Image
            <input type="blob" name="image" value="">
        </label> -->
        
        <div class = "button">
            <input type="submit" value="Save">
        </div>
       
    </form>

    <form class="button" action="plant_delete.php" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="submit" value="Eliminer Compte">
    </form>
    
    
    
</body>
</html>
