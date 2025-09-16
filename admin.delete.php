<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$ad_idcard = $_GET['ad_idcard'];
$conn->query("DELETE FROM `admin.work` WHERE `ad_idcard`=`ad_id`;");
header("Location: admin.list.php");
?>