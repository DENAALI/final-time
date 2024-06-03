<?php
include_once(__DIR__ . '/../connect.php');

if (isset($_POST['delete_id'])) {
    $hall_id = $_POST['delete_id'];

    $sql = "DELETE FROM hall WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $hall_id);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to delete hall.'));
    }

    $stmt->close();
}

mysqli_close($conn);
?>
