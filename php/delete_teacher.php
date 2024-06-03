<?php
include_once(__DIR__ . '/../connect.php');

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM teacher WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        http_response_code(500);
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    http_response_code(400);
    echo "No ID provided for deletion";
}

mysqli_close($conn);
?>
