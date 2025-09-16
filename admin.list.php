<?php
    include('navbar_admin.php');
        include('admin.con.php');
        $query = "SELECT * FROM `admin.work` ORDER BY ad_idcard ASC";
        $result = mysqli_query($con,$query);
        echo ' <table class="table table-hover">';
        echo "
            <tr>
            <td>ad_idcard</td>
            <td>ad_name</td>
            <td>ad_email </td>
            <td>ad_tel</td>
            <td>ad_address</td>
            <td>edit</td>
            <td>delete</td>
        </tr>";

    while($sow = mysqli_fetch_array($result)) {
    echo "<tr>";
        echo "<td>" .$sow["ad_idcard"] . "</td>";
        echo "<td>" .$sow["ad_name"] . "</td>";
        echo "<td>" .$sow["ad_tel"] . "</td>";
        echo "<td>" .$sow["ad_address"] . "</td>";
    //     echo "<td><a href='#?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
    // echo "<td><a href='#?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')
    // \" class='btn btn-danger btn-xs'>ลบ</a></td> "; 
    echo "</tr>";
    }    
    echo "</table>";
    mysqli_close($con);
    ?>