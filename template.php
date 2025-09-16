<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");

// เช็คการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลการขายตาม ID
$sale_id = $_GET['id'];
$sale_query = $conn->query("SELECT * FROM `sales.work`;");
$sale = $sale_query->fetch_assoc();

// if (!$sale) {
//     die("ไม่พบข้อมูลการขาย");
// }
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
            <ul id="item-list">
                <li><?= $sale['mn_name'] ?> - <?= $sale['quantity'] ?> x <?= $sale['total_price'] / $sale['quantity'] ?> บาท</li>
            </ul>
            <p>รวมทั้งหมด: <?= $sale['total_price'] ?> บาท</p>
            <button onclick="window.print()">พิมพ์ใบเสร็จ</button>
        </div>
    </div>
</body>
</html>
