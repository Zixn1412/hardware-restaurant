<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuangfa Delivery - สมัครสมาชิกเดลิเวอรี่</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://via.placeholder.com/1500x1000?text=Fuangfa+Delivery');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            width: 800px;
            text-align: left;
        }

        .form-container h2 {
            color: #333;
            font-size: 26px;
            margin-bottom: 25px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .form-container label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            text-align: left;
            display: block;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            align-items: center;
        }

        .form-group input[type="text"], 
        .form-group input[type="password"], 
        .form-group input[type="file"], 
        .form-group input[type="email"] {
            width: 60%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .form-group label {
            width: 30%;
        }

        .form-group .input-wrapper {
            width: 65%;
        }

        .form-container .button-group {
            display: flex;
            justify-content: space-between;
        }

        .form-container input[type="submit"], 
        .form-container input[type="reset"] {
            width: 48%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container input[type="reset"] {
            background-color: #f44336;
            color: white;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        .form-container input[type="reset"]:hover,
        .form-container input[type="submit"]:hover {
            opacity: 0.9;
        }

        .form-container p {
            font-size: 14px;
            color: #555;
            text-align: center;
        }

        .form-container p a {
            color: #007BFF;
            text-decoration: none;
        }

        .form-container p a:hover {
            text-decoration: underline;
        }

        h3 {
            color: #d9534f;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }

            .form-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .form-group label,
            .form-group input {
                width: 100%;
            }
        }
    </style>
</head>
<body>

        <?php
        $conn = new mysqli("localhost", "root", "", "projectwork");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $del_idcard = $_POST["del_idcard"];
        $del_photo = $_FILES["del_photo"]["name"];
        $del_name = $_POST["del_name"];
        $del_address = $_POST["del_address"];
        $del_tel = $_POST["del_tel"];
        $del_email = $_POST["del_email"];
        $del_pass = $_POST["del_pass"];

        if (move_uploaded_file($_FILES["del_photo"]["tmp_name"], "img/" . $_FILES["del_photo"]["name"])) {
            $dl_photo = $_FILES["del_photo"]["name"];
        } else {
            echo "<h3>การอัปโหลดรูปภาพล้มเหลว</h3>";
            exit(); // หยุดการทำงานถ้าการอัปโหลดไม่สำเร็จ
        }
            // Move uploaded photo to 'img' folder
            move_uploaded_file($_FILES["del_photo"]["tmp_name"], "img/" . $_FILES["del_photo"]["name"]);
            // Insert into database
            $sql = "INSERT INTO `delivery.work`(`del_idcard`, `del_name`, `del_photo`, `del_tel`, `del_address`, `del_email`, `del_pass`, `del_status`) 
            VALUES ('$del_idcard','$del_name','$del_photo','$del_tel','$del_address','$del_email','$del_pass','pending')";

        if ($conn->query($sql) === TRUE) {
        echo "<script> alert('สมัครสมาชิกเสร็จสิ้น กรุณารอผู้ดูแลอนุมัติก่อนทำการเข้าสู่ระบบ'); </script>";
        echo "<script> window.location = 'login_delpj.php'; </script>";
        } else {
        echo "ข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
        }
            
        }
    ?>

    <div class="form-container">
        <h2>สมัครสมาชิกเดลิเวอรี่ Fuangfa Delivery</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="del_idcard">หมายเลขบัตรประจำตัวประชาชน:</label>
                <div class="input-wrapper">
                    <input type="text" name="del_idcard" id="del_idcard" maxlength="13" required>
                </div>
            </div>

            <div class="form-group">
                <label for="del_photo">รูป:</label>
                <div class="input-wrapper">
                    <input type="file" name="del_photo" id="del_photo" required>
                </div>
            </div>

            <div class="form-group">
                <label for="del_name">ชื่อ - นามสกุล:</label>
                <div class="input-wrapper">
                    <input type="text" name="del_name" id="del_name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="del_tel">เบอร์โทรศัพท์:</label>
                <div class="input-wrapper">
                    <input type="text" name="del_tel" id="del_tel" maxlength="10" required>
                </div>
            </div>

            <div class="form-group">
                <label for="del_address">ที่อยู่:</label>
                <div class="input-wrapper">
                    <input type="text" name="del_address" id="del_address" required>
                </div>
            </div>

            <div class="form-group">
                <label for="del_email">อีเมล์:</label>
                <div class="input-wrapper">
                    <input type="email" name="del_email" id="del_email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="del_pass">รหัสผ่าน:</label>
                <div class="input-wrapper">
                    <input type="password" name="del_pass" id="del_pass" maxlength="8" required>
                </div>
            </div>

            <div class="button-group">
                <input type="reset" value="ยกเลิก">
                <input type="submit" value="สมัครสมาชิก">
            </div>
        </form>
    </div>

</body>
</html>

<!-- สมัครสมาชิกลูกค้า -->
<!-- เด้งไปหน้า indexlogin2.php -->