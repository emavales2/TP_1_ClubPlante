
<?php

require_once('../../class/Plant.php');
include('../../head.php');

$plant = new Plant;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;


    $showOneId = $plant->createPlant($data);


    header("location:plant_show.php?id=$showOneId");
}

?>



    <h2>Créer Nouvelle Fiche</h2>
    <!--<form action="member_store.php" method="post">-->
    <form action="plant_create.php" method="post">
        
        <label>Nom
            <input type="text" name="name">
        </label>

        <label>Type
            <input type="text" name="type">
        </label>
        
        <label>Description
            <textarea name="description" rows="6" cols="40"> 
            </textarea>
        </label>

        <label>Soins
            <textarea name="care" rows="6" cols="40"> 
            </textarea>
        </label>

        <!-- <label>Image
            <input type="blob" name="image" value="">
        </label> -->
        
        <input class="button" type="submit" value="Save">
       
    </form>
    
</body>
</html>



