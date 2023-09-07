<?php
//print_r($_POST);
//die();

require_once('../../class/Plant.php');

$plant = new Plant;

$id = $_POST['id'];

$plant->deletePlant($id);

header("location: plant_index.php");

echo "<h3>Deleted successfully!<h3>";

// if ($delete) {
//     header("location: member_index.php");
// } else {
//     echo "Failed to delete member.";
// }
?>

