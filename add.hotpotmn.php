<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mn_name = $_POST['mn_name'];
    $mn_photo = $_POST['mn_photo'];
    $mn_price = $_POST['mn_price'];
    $mn_id = $_POST['mn_id'];
    $conn->query("INSERT INTO `mune.work`(`mn_name`, `mn_photo`, `mn_price`, `mn_id`) VALUES ('$mn_name','$mn_photo','$mn_price','$mn_id');");
    header("Location: hotpotadmin.php");
}
$conn->close();
?>

<form method="POST">
    <label>ชื่อเมนู:</label>
    <input type="text" name="name" required>
    <label>รูปภาพ:</label>
    <input type="file" name="photo" required>
    <label>ราคา:</label>
    <input type="number" name="price" required>
    <label>ไอดีเมนู:</label>
    <input type="text" name="id" required>
    <button type="submit">เพิ่มเมนู</button>
</form>