<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$mn_id = $_GET['mn_id'];
$conn->query("DELETE FROM `mune.work` WHERE `mn_id`=`mn_id`;");
header("Location: hotpotadmin.php");
?>
