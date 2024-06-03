<?php
include_once(__DIR__ . '/../connect.php');

$action = isset($_POST['hall_id']) && !empty($_POST['hall_id']) ? 'update' : 'add';

if ($action == 'update') {
    $hall_id = $_POST['hall_id'];
    $hall_name = $_POST['hallName'];
    $hall_capacity = $_POST['hallCapacity'];
    $type = $_POST['type'];

    $sql = "UPDATE hall SET hall_name = ?, hall_capacity = ?, type_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $hall_name, $hall_capacity, $type, $hall_id);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true,'action' => 'update'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to update hall.'));
    }

    $stmt->close();
} elseif ($action == 'add') {
    $hall_name = $_POST['hallName'];
    $hall_capacity = $_POST['hallCapacity'];
    $type = $_POST['type'];

    $sql = "INSERT INTO hall (hall_name, hall_capacity, type_name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $hall_name, $hall_capacity, $type);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true,'action' => 'add'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to add hall.'));
    }

    $stmt->close();
}

mysqli_close($conn);
?>
