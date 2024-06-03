<?php
include_once(__DIR__ . '/../connect.php');

    
    $year = $_POST['year'];
    $name = $_POST['CoursesName'];
    $semester = $_POST['term'];
    $major_id = $_POST['major'];
    $subject_id = $_POST['CoursesID'];
    $pre_sub_num = $_POST['preCourseID'];
    $type = $_POST['type'];
    $Capacity = $_POST['Capacity'];
    
    $stmt = $conn->prepare("INSERT INTO subjects (year, semester, major_id, subject_id, pre_sub_num, name, type_name, Capacity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiissi", $year, $semester, $major_id, $subject_id, $pre_sub_num, $name, $type, $Capacity);
    
    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Course added successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Failed to add course"));
    }
    
    $stmt->close();
    $conn->close();

?>
