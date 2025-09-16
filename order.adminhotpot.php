<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$menus = $conn->query("SELECT * FROM `mune.work;");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mn_id = $_POST['mn_id'];
    $mn_quantity = $_POST['mn_quantity'];
    
    // ดึงราคาของเมนูที่เลือก
    $mn_id = $conn->query("SELECT price FROM menu WHERE 'mn_id' = '$mn_id';")->fetch_assoc();
    $total_price = $total_price['total_price'] * $quantity;
    
    // บันทึกลงในประวัติการขาย
    $conn->query("INSERT INTO `sales.work`(`mn_id`, `total_price`, `sale_date`, `quantity`) VALUES ('$mn_id','$total_price','$sale_date','$quantity');");
    
    echo "สั่งซื้อสำเร็จ!";
}
?>

<form method="POST">
    <label>เลือกเมนู:</label>
    <select name="mn_id">
        <?php while ($mn_id = $menus->fetch_assoc()) { ?>
            <option value="<?= $mn_id['mn_id'] ?>"><?= $mn_name['mn_name'] ?> - <?= $mn_price['mn_price'] ?> บาท</option>
        <?php } ?>
    </select>
    <label>จำนวน:</label>
    <input type="number" name="quantity" required>
    <button type="submit">สั่งซื้อ</button>
</form>
