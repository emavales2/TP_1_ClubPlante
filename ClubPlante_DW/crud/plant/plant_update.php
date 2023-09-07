<?php

/*echo "var_dump POST on plant_update <br>";
var_dump($_POST);
echo " end of vardump <br>";*/

require_once('../../class/Plant.php');

$plant = new Plant;
$update = $plant->updatePlant($_POST);


?>

