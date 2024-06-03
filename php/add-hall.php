<?php
// معلومات الاتصال بقاعدة البيانات
include_once(__DIR__ . '/../connect.php');


// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استقبال البيانات من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hallName = $_POST["hallName"];
  
    $hallCapacity = $_POST["hallCapacity"];
    $type = $_POST["type"];

    // استخدام إستعلام SQL لإدخال البيانات إلى قاعدة البيانات
    $sql = "INSERT INTO hall (hall_name, hall_capacity, type_name) VALUES ('$hallName',  $hallCapacity, '$type')";

       
    if (mysqli_query($conn, $sql)) {
        $response = array("status" => "success", "message" => "Hall added successfully");
    } else {
        $response = array("status" => "error", "message" => "Failed to add hall");
    }

    echo json_encode($response);
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>