<?php
include_once(__DIR__ . '/../connect.php');

$teacherId = $_POST['teacher_id'] ?? null;
$teacherName = $_POST['teacherName'] ?? null;
$major = $_POST['major'] ?? null;
$active = $_POST['active'] ?? null;
$dateFrom = $_POST['dateFrom'] ?? null;
$dateTo = $_POST['dateTo'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$degree = $_POST['Academic'] ?? null;
$type = $_POST['type-user'] ?? null;
// if ($password) {
//     // توليد هاش جديد لكلمة المرور الجديدة
//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
// } else {
//     // استخدام الهاش السابق لكلمة المرور
// //     $hashedPassword = $row['password'];
// // }
// $newPassword = $_POST['newPassword'] ?? null;
// if ($newPassword) {
//     // توليد هاش جديد لكلمة المرور الجديدة
//     $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
// } else {
//     // استخدام الهاش السابق لكلمة المرور
//     $hashedPassword = $password;
// }
$otp = rand(100000,999999);
$action = isset($teacherId) && !empty($teacherId) ? 'update' : 'add';

if ($teacherName && $major && $active && $dateFrom && $dateTo && $email && $degree && $type) {
    // Perform additional validation here if needed
    
    if ($action == 'update') {
    
        $check_stmt = $conn->prepare("SELECT COUNT(*) AS count FROM teacher WHERE id = ?");
        $check_stmt->bind_param('i', $teacherId);
        $check_stmt->execute();
        $result = $check_stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row['count'] == 0) {
            echo json_encode(array('status' => 'error', 'message' => 'Teacher does not exist.'));
            exit;
        }

        $stmt = $conn->prepare("UPDATE teacher SET name = ?, email = ?, password = ?, depar_num = ?, active = ?, date_from = ?, date_to = ?, degree = ?, type = ? WHERE id = ?");
        $stmt->bind_param("sssisssssi", $teacherName, $email, $password, $major, $active, $dateFrom, $dateTo, $degree, $type, $teacherId);

        if ($stmt->execute()) {
            echo json_encode(array('success' => true,'action' => 'update','value' => $otp));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to update teacher.'));
        }

    } elseif ($action == 'add') {
        $stmt = $conn->prepare("INSERT INTO teacher (name, email, password, depar_num, active, date_from, date_to, degree, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisssss", $teacherName, $email, $otp, $major, $active, $dateFrom, $dateTo, $degree, $type);

        if ($stmt->execute()) {
            echo json_encode(array('success' => true,'action' => 'add','value' => $otp,'email' => $email,'name' => $teacherName));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to add teacher.'));
        }
    }

    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "All fields are required."));
}

$conn->close();
?>