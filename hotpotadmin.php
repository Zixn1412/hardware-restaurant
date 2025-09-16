<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");

// เช็คการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลเมนูอาหาร
$menus = $conn->query("SELECT * FROM `mune.work`;");
if (!$menus) {
    die("Error: " . $conn->error);
}

// ดึงข้อมูลประวัติการขาย
$sales = $conn->query("SELECT * FROM `sales.work`;");
if (!$sales) {
    die("Error: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หมาล่าเนื้อ - ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <span class="fs-4">หมาล่าเนื้อ - ระบบ</span>
        <a href="logoutmala.php"><button class="btn btn-danger ms-3">Logout</button></a>
    </div>
</header>

<div class="container">
    <h3 class="text-center">จัดการเมนูอาหาร</h3>
    <a href="add.hotpotmn.php" class="btn btn-primary mb-3">➕ เพิ่มเมนู</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ชื่อเมนู</th>
                <th>ราคา</th>
                <th>ไอดีเมนู</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $menus->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['mn_name'] ?></td>
                    <td><?= $row['mn_price'] ?> บาท</td>
                    <td><?= $row['mn_id'] ?></td>
                    <td>
                        <a href="edit.hotpotmn.php?id=<?= $row['mn_id'] ?>" class="btn btn-warning">✏️ แก้ไข</a>
                        <a href="del.hotpotmn.php?id=<?= $row['mn_id'] ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">🗑️ ลบ</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3 class="text-center mt-5">📜 ประวัติการขาย</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ชื่อเมนู</th>
                <th>จำนวน</th>
                <th>ราคารวม</th>
                <th>วันที่ขาย</th>
                <th>ออกใบเสร็จ</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($sale = $sales->fetch_assoc()) { ?>
                <tr>
                    <td><?= $sale['mn_name'] ?></td>
                    <td><?= $sale['quantity'] ?></td>
                    <td><?= $sale['total_price'] ?> บาท</td>
                    <td><?= $sale['sale_date'] ?></td>
                    <td>
                        <a href="invoice.php?id=<?= $sale['sale_id'] ?>" target="_blank" class="btn btn-success" href="template.php">🧾 ออกใบเสร็จ</href=>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
