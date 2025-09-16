<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM `delivery.work`;");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $conn->query("UPDATE `delivery.work` SET `del_idcard`='$del_idcard',`del_name`='$del_name',`del_photo`='$del_photo',`del_tel`='$del_tel',
    `del_address`='$del_address',`del_email`='$del_email',`del_pass`='$del_pass',`del_status`='pending';");
    header("Location: hotpotadmin.php");
}
?>

<form method="POST">
    <label>ชื่อ:</label>
    <input type="text" name="name" value="<?= $row['del_name'] ?>" required>
    <label>ราคา:</label>
    <input type="number" name="price" value="<?= $row['mn_price'] ?>" required>
    <label>ไอดีเมนู:</label>
    <input type="text" name="id" value="<?= $row['mn_id'] ?>" required>
    <button type="submit">อัปเดต</button>
</form>
