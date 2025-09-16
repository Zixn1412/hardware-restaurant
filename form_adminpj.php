<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuangfa Delivery - สมัครสมาชิกแอดมิน</title>
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
        $ad_idcard = $_POST["ad_idcard"];
        $ad_photo = $_FILES["ad_photo"]["name"];
        $ad_name = $_POST["ad_name"];
        $ad_address = $_POST["ad_address"];
        $ad_tel = $_POST["ad_tel"];
        $ad_email = $_POST["ad_email"];
        $ad_pass = $_POST["ad_pass"];
        
        if (move_uploaded_file($_FILES["ad_photo"]["tmp_name"], "img/" . $_FILES["ad_photo"]["name"])) {
            $ad_photo = $_FILES["ad_photo"];
        } else {
            echo "<h3>การอัปโหลดรูปภาพล้มเหลว</h3>";
            exit(); // หยุดการทำงานถ้าการอัปโหลดไม่สำเร็จ
        }
            // Move uploaded photo to 'img' folder
            move_uploaded_file($_FILES["ad_photo"]["tmp_name"], "img/" . $_FILES["ad_photo"]["name"]);
            // Insert into database
           $sql = "INSERT INTO `admin.work`(`ad_idcard`, `ad_photo`, `ad_name`, `ad_address`, `ad_tel`, `ad_email`, `ad_pass`, `ad_status`) 
           VALUES ('$ad_idcard','$ad_photo','$ad_name','$ad_tel','$ad_address','$ad_email','$ad_pass','pending')";

        if ($conn->query($sql) === TRUE) {
        echo "<script> alert('สมัครสมาชิกเสร็จสิ้น กรุณารอผู้ดูแลอนุมัติก่อนทำการเข้าสู่ระบบ'); </script>";
        echo "<script> window.location = 'login_adminpj.php'; </script>";
        } else {
        echo "ข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
        }
            
        }
    ?>

    <div class="form-container">
        <h2>สมัครสมาชิกแอดมิน Fuangfa Delivery</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="ad_idcard">หมายเลขบัตรประจำตัวประชาชน:</label>
                <div class="input-wrapper">
                    <input type="text" name="ad_idcard" id="ad_idcard" maxlength="13" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ad_photo">รูป:</label>
                <div class="input-wrapper">
                    <input type="file" name="ad_photo" id="ad_photo" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ad_name">ชื่อ - นามสกุล:</label>
                <div class="input-wrapper">
                    <input type="text" name="ad_name" id="ad_name" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ad_tel">เบอร์โทรศัพท์:</label>
                <div class="input-wrapper">
                    <input type="text" name="ad_tel" id="ad_tel" maxlength="10" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ad_address">ที่อยู่:</label>
                <div class="input-wrapper">
                    <input type="text" name="ad_address" id="ad_address" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ad_email">อีเมล์:</label>
                <div class="input-wrapper">
                    <input type="email" name="ad_email" id="ad_email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ad_pass">รหัสผ่าน:</label>
                <div class="input-wrapper">
                    <input type="password" name="ad_pass" id="ad_pass" maxlength="8" required>
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