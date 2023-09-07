<?php

require_once('../../class/Member.php');

$member = new Member;
$city_id = $_POST['city_id']; // inclure city id mais changer à city name
$create = $member->createMember($data);

//echo $create;

header("location:member_show.php?id=$create");

?>