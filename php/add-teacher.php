<?php
include_once(__DIR__ . '/../connect.php');

$teacherName = $_POST['teacherName'] ?? null;
$major = $_POST['major'] ?? null;
$active = $_POST['active'] ?? null;
$dateFrom = $_POST['dateFrom'] ?? null;
$dateTo = $_POST['dateTo'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$degree = $_POST['Academic'] ?? null;
$type = $_POST['type-user'] ?? null;


if ($teacherName && $major && $active && $dateFrom && $dateTo && $email && $password && $degree && $type) {
    $stmt = $conn->prepare("INSERT INTO teacher (name, email, password, depar_num, active, date_from, date_to, degree, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisssss", $teacherName, $email, $password, $major, $active, $dateFrom, $dateTo, $degree, $type);

    if ($stmt->execute()) {
        $response = array("status" => "success", "message" => "Teacher added successfully");
    } else {
        $response = array("status" => "error", "message" => "Failed to add Teacher");
    }

    echo json_encode($response);
    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "All fields are required."));
}

$conn->close();
?>
