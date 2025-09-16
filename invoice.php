<?php
// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับ sale_id จาก URL
$sale_id = isset($_GET['id']) ? $_GET['id'] : 0;

// ดึงข้อมูลรายการขายทั้งหมดของ sale_id นั้น
$sql = "SELECT mn_name, quantity, total_price FROM `sales.work` WHERE sale_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $sale_id);
$stmt->execute();
$result = $stmt->get_result();

// ตรวจสอบข้อมูล
if ($result->num_rows > 0) {
    $items = [];
    $total = 0;

    // เก็บข้อมูลรายการอาหาร
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
        $total += $row['total_price'];
    }
} else {
    echo "ไม่พบข้อมูลใบเสร็จ";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ร้านอาหาร - ออกใบเสร็จ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .receipt {
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
        }
        button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ร้านอาหาร - ออกใบเสร็จ</h1>

        <div class="receipt" id="receipt">
            <h2>ใบเสร็จ</h2>
            <ul>
                <?php foreach ($items as $item) { ?>
                    <li><?= $item['mn_name'] ?> - <?= $item['quantity'] ?> x <?= $item['total_price'] / $item['quantity'] ?> บาท</li>
                <?php } ?>
            </ul>
            <p>รวมทั้งหมด: <?= number_format($total, 2) ?> บาท</p>
            <button onclick="window.print()">พิมพ์ใบเสร็จ</button>
        </div>
    </div>
</body>
</html>
