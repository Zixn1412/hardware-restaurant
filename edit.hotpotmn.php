<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM `mune.work` WHERE mn_name = '$mn_name';");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $conn->query("UPDATE `mune.work` SET `mn_name`='$mn_name',`mn_photo`='$mn_photo',`mn_price`='$mn_price',`mn_id`='$mn_id';");
    header("Location: hotpotadmin.php");
}
?>

<form method="POST">
    <label>ชื่อเมนู:</label>
    <input type="text" name="name" value="<?= $row['mn_name'] ?>" required>
    <label>ราคา:</label>
    <input type="number" name="price" value="<?= $row['mn_price'] ?>" required>
    <label>ไอดีเมนู:</label>
    <input type="text" name="id" value="<?= $row['mn_id'] ?>" required>
    <button type="submit">อัปเดต</button>
</form>
