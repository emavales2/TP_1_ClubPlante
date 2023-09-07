<?php

require_once('../../class/Plant.php');

$plant = new Plant;

$create = $plant->createPlant($data);

//echo $create;

header("location:plant_show.php?id=$create");

?>