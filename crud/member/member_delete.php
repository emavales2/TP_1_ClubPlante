<?php
//print_r($_POST);
//die();

require_once('../../class/Member.php');

$member = new Member;

$id = $_POST['id'];

$member->deleteMember($id);

header("location: member_index.php");

echo "<h3>Deleted successfully!<h3>";

// if ($delete) {
//     header("location: member_index.php");
// } else {
//     echo "Failed to delete member.";
// }
?>

