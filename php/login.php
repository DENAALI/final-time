<?php
session_start();
include_once(__DIR__ . '/../connect.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, password ,type FROM teacher WHERE email = ? and password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['teacher_id'] = $row['id'];
        $_SESSION['type'] = $row['type'];
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Invalid email or password."));
    }

    $stmt->close();
} else {
    echo json_encode(array("success" => false, "message" => "Please provide email and password."));
}
?>
