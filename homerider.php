<?php
  $con = new mysqli("localhost", "root", "12345678", "hardwarert");

  // ตรวจสอบว่าการเชื่อมต่อสำเร็จหรือไม่
  if ($con->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $con->connect_error);
  }

  // เลือกฐานข้อมูล (หากตารางอยู่ใน database อื่น)
  $con->select_db("delivery");

  // คำสั่ง SQL (แก้ไขให้ถูกต้อง)
  $query = "SELECT * FROM `delivery.work`;"; 
  $result = mysqli_query($con, $query) or die("Query failed: " . mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIDER - HARDWARE RESTAURANT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <span class="fs-4">RIDER - HARDWARE RESTAURANT</span>
        <a href="logoutrider.php"><button class="btn btn-danger ms-3">Logout</button></a>
    </div>
</header> 

<div class="container">
    <h3 class="text-center">โปรไฟล์ไรเดอร์</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>รหัสบัตรประชาชน</th>
                <th>ชื่อ</th>
                <th>อีเมล์</th>
                <th>เบอร์โทร</th>
                <th>ที่อยู่</th>
                <th>แก้ไขประวัติ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['del_idcard'] ?></td>
                        <td><?= $row['del_name'] ?></td>
                        <td><?= $row['del_email'] ?></td>
                        <td><?= $row['del_tel'] ?></td>
                        <td><?= $row['del_address'] ?></td>
                        <td>
                          <a href="edit.rider.php?id=<?= $row['del_email'] ?>" class="btn btn-warning">✏️ แก้ไข</a>
                        </td>
                    </tr>
                <?php } 
            } else { ?>
                <tr><td colspan="5" class="text-center">ไม่มีข้อมูล</td></tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
