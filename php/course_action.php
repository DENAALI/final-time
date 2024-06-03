<?php
include_once(__DIR__ . '/../connect.php');

$action = isset($_POST['course_id']) && !empty($_POST['course_id']) ? 'update' : 'add';

if ($action == 'update') {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['courseName'];
    $course_id_val = $_POST['courseID'];
    $pre_course_id = $_POST['preCourseID'];
    $major = $_POST['major'];
    $type = $_POST['type'];
    $capacity = $_POST['capacity'];
    $year = $_POST['year'];
    $term = $_POST['term'];

    $sql = "UPDATE subjects SET name = ?, subject_id = ?, pre_sub_num = ?, major_id = ?, type_name = ?, Capacity = ?, year = ?, semester = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssi', $course_name, $course_id_val, $pre_course_id, $major, $type, $capacity, $year, $term, $course_id);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true,'action' => 'update'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to update courses.'));
    }
    $stmt->close();
} elseif ($action == 'add') {
    $course_name = $_POST['courseName'];
    $course_id_val = $_POST['courseID'];
    $pre_course_id = $_POST['preCourseID'];
    $major = $_POST['major'];
    $type = $_POST['type'];
    $capacity = $_POST['capacity'];
    $year = $_POST['year'];
    $term = $_POST['term'];

    $sql = "INSERT INTO subjects (name, subject_id, pre_sub_num, major_id, type_name, Capacity, year, semester) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss', $course_name, $course_id_val, $pre_course_id, $major, $type, $capacity, $year, $term);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true,'action' => 'add'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to add courses.'));
    }

    $stmt->close();
}

mysqli_close($conn);
?>
