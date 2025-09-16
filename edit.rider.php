<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM `delivery.work`;");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $conn->query("UPDATE `delivery.work` SET `del_idcard`='$del_idcard',`del_name`='$del_name',`del_photo`='$del_photo',
    `del_tel`='$del_tel',`del_address`='$del_address',`del_email`='$del_email',`del_pass`='$del_pass',`del_status`='$del_status';");
    header("Location: homerider.php");
}
?>

<form method="POST">
    <label>ชื่อ:</label>
    <input type="text" name="name" value="<?= $row['del_name'] ?>" required>
    <label>อีเมล์:</label>
    <input type="text" name="price" value="<?= $row['del_email'] ?>" required>
    <label>เบอร์โทรศัพท์:</label>
    <input type="number" name="id" value="<?= $row['del_tel'] ?>" required>
    <label>ที่อยู่:</label>
    <input type="text" name="id" value="<?= $row['del_address'] ?>" required>
    <button type="submit">อัปเดต</button>
</form>
