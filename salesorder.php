<?php
$conn = new mysqli("localhost", "root", "12345678", "hardwarert");
$sales = $conn->query("SELECT * FROM `sales.work`;");
?>

<h2>ประวัติการขาย</h2>
<table border="1">
    <tr>
        <th>ชื่อเมนู</th>
        <th>จำนวน</th>
        <th>ราคารวม</th>
        <th>วันที่ขาย</th>
    </tr>
    <?php while ($sale = $sales->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['mn_name'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['total_price'] ?> บาท</td>
            <td><?= $row['sale_date'] ?></td>
        </tr>
    <?php } ?>
</table>

<!-- ออกใบเสร็จ -->
<td>
    <a href="invoice.php?id=<?= $sale_id['sale_id'] ?>" target="_blank">🧾 ออกใบเสร็จ</a>
</td>
