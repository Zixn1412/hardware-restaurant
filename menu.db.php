<?php
// สร้างการเชื่อมต่อ
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}
?>
