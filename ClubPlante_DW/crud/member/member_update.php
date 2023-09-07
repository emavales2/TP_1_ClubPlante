<?php

/*echo "var_dump POST on member_update <br>";
var_dump($_POST);
echo " end of vardump <br>";*/

require_once('../../class/Member.php');

$member = new Member;
$update = $member->updateMember($_POST);


?>

