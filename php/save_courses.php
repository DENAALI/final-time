<?php
session_start();

if (!isset($_SESSION['teacher_id'])) {
    echo "Session expired. Please log in again.";
    exit();
}

if (isset($_POST['select']) && is_array($_POST['select'])) {
    include '../connect.php';

    $teacher_id = $_SESSION['teacher_id'];
    $values = array();

    foreach ($_POST['select'] as $subject_name) {
        $subject_id_query = "SELECT subject_id FROM subjects WHERE name = '$subject_name'";
        $subject_id_result = mysqli_query($conn, $subject_id_query);

        if ($subject_id_result && mysqli_num_rows($subject_id_result) > 0) {
            $subject_id_row = mysqli_fetch_assoc($subject_id_result);
            $subject_id = $subject_id_row['subject_id'];
            $values[] = "('$teacher_id', '$subject_id', '0')";
        }
    }

    if (!empty($values)) {   
        $insert_query = "INSERT INTO tetches (techer_id, subject_id, state) VALUES " . implode(", ", $values);
        if (mysqli_query($conn, $insert_query)) {
            echo "Records added successfully";
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Please select at least one subject.";
    }

    mysqli_close($conn);
} else {
    echo "No subjects selected.";
}
?>
