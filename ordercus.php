<?php



// เชื่อมต่อฐานข้อมูล (แก้ไขค่าตามฐานข้อมูลของคุณ)
$servername = "localhost";
$username = "root";  // เปลี่ยนตามฐานข้อมูลของคุณ
$password = "";      // ถ้ามีรหัสผ่านให้ใส่ตรงนี้
$dbname = "your_database"; // เปลี่ยนเป็นชื่อฐานข้อมูลของคุณ

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error]));
}

// รับข้อมูล JSON จาก JavaScript
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "ไม่มีข้อมูลที่ถูกส่งมา"]);
    exit;
}

// ดึงข้อมูลจาก JSON
$ct_name = $conn->real_escape_string($data["ct_name"]);
$ct_tel = $conn->real_escape_string($data["ct_tel"]);
$ct_address = $conn->real_escape_string($data["ct_address"]);
$total_price = (int)$data["total_price"];
$order_date = date("Y-m-d H:i:s");

// เพิ่มคำสั่งซื้อเข้าไปในฐานข้อมูล
$sql = "INSERT INTO orders (ct_name, ct_tel, ct_address, total_price, order_date)
        VALUES ('$ct_name', '$ct_tel', '$ct_address', '$total_price', '$order_date')";

if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id; // ดึง ID คำสั่งซื้อที่เพิ่งเพิ่มเข้าไป

    // เพิ่มรายละเอียดรายการอาหาร
    foreach ($data["cart"] as $item) {
        $mn_name = $conn->real_escape_string($item["name"]);
        $mn_price = (int)$item["price"];
        $mn_quantity = (int)$item["quantity"];
        
        $sql_detail = "INSERT INTO `order.work`(`ct_name`, `ct_tel`, `ct_address`, `mn_name`, `mn_price`) 
        VALUES ('$ct_name','$ct_tel','$ct_address','$mn_name','$mn_price');";
        $conn->query($sql_detail);
    }

    echo json_encode(["status" => "success", "message" => "สั่งอาหารสำเร็จ!"]);
} else {
    echo json_encode(["status" => "error", "message" => "เกิดข้อผิดพลาด: " . $conn->error]);
}

$conn->close();
?>

