<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM `admin.work WHERE ad_idcard = '$ad_idcard';");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad_idcard = $_POST['ad_idcard'];
    $ad_name = $_POST['ad_name'];
    $ad_email = $_POST['ad_email'];
    $ad_tel = $_POST['ad_address'];
    $ad_address = $_POST['ad_tel'];
    $conn->query("UPDATE `admin.work` SET `ad_idcard`='$ad_idcard',`ad_name`='$ad_name',`ad_address`='$ad_address',`ad_tel`='$ad_tel',`ad_email`='$ad_email';");
    header("Location: admin.list.php");
}
?>

<form method="POST">
    <label>รหัสบัตรประชาชน:</label>
    <input type="number" name="idcard" value="<?= $row['ad_idcard'] ?>" required>
    <label>=ชื่อ:</label>
    <input type="text" name="name" value="<?= $row['ad_name'] ?>" required>
    <label>อีเมล์:</label>
    <input type="text" name="email" value="<?= $row['ad_email'] ?>" required>
    <label>เบอร์โทร:</label>
    <input type="number" name="tel" value="<?= $row['ad_tel'] ?>" required>
    <label>ที่อยู่:</label>
    <input type="text" name="address" value="<?= $row['ad_address'] ?>" required>
    <button type="submit">อัปเดต</button>
</form>
