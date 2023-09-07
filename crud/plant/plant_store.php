<?php

require_once('../../class/Plant.php');

$plant = new Plant;
//$city_id = $_POST['city_id']; // inclure city id mais changer à city name
$create = $plant->createPlant($data);

//echo $create;

header("location:plant_show.php?id=$create");

?>