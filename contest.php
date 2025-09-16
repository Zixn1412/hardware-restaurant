<?php
    $con = new mysqli ("localhost","root","","projectwork");
    $conn->set_charset('uft8');
    $mysql = "SELECT * FROM `admin.work` WHERE 'ad_status' LIKE 'NO'";
    mysqli_set_charset($conn,"UFT8");
    $result=$conn->query($sql);

        echo "<table class='table teble-sm'>";
        echo "<tr>";
        echo "<th>" .รูป. "</th>";
        echo "<th>" .เลขบัตรประจำตัวประชาชน. "</th>";
        echo "<th>" .ชื่อ - สกุล. "</th>";
        echo "<th>" .เบอร์โทรศัพท์. "</th>";
        echo "<th>" .อนุมัติผู้ใช้งาน. "</th>";
        echo "</th>";

    while($row=$result->fetch_assoc())
    {
        echo "<th>";
        echo "<td><center><img src=img/" .$row["ad_photo"]." width=15%></center></td>";
        echo "<td><input class='form-control form-control-sm' readonly value="$row["ad_idcard"]."></td>";
        echo "<td><input class='form-control form-control-sm' readonly value="$row["ad_name"]."></td>";
        echo "<td><input class='form-control form-control-sm' readonly value="$row["ad_tel"]."></td>";

        echo "<form action=ad_status.php method=post>";
        echo "<td>";
        echo "<input type=hidden name=ad_name value=".$row["ad_name"].">";
        echo "<input type=hidden name=ad_status value=".$row["ad_status"].">";
        echo "<button class='btn btn-danger' input type=submit value=อนุมัติผู้ใช้งาน><i class='bi bi-person-fill-check'></i> อนุมัติผู้ใช้งาน";
        echo "</button>";
        echo "</form></td>";
    }
    echo "</table>";
    $conn->close();
?>