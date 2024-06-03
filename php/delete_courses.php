<?php
include_once(__DIR__ . '/../connect.php');

if (isset($_POST['delete_id'])) {
    $course_id = $_POST['delete_id'];

    $sql = "DELETE FROM subjects WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $course_id);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to delete course.'));
    }

    $stmt->close();
}

mysqli_close($conn);
?>
