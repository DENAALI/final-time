
<?php
$course_duration = 75 * 60;
$start='12:30-14:00';
$start_time = strtotime(explode('-', $start)[0]);
                                        $end_time = $start_time + $course_duration;
                                        echo  $start_time . ' minutes'.$start;
                                        echo  $end_time . ' minutes'.$start;
?>

<!-- <?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "university_schedule";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the section table
$sql = "SELECT * FROM section ORDER BY id";
$result = $conn->query($sql);

$sections = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sections[] = $row;
    }
}

// Print the original sections
echo "Original Sections:\n" . "<br>";
foreach ($sections as $section) {
    echo "ID: {$section['id']}, Name: {$section['name']}, Students: {$section['students_number']}\n" . "<br>";
}

// Delete the last section
$last_section = array_pop($sections);
$students_to_distribute = $last_section['students_number'];

// Distribute the students among the remaining sections
$num_sections = count($sections);
$extra_students = $students_to_distribute % $num_sections;
$students_per_section = intdiv($students_to_distribute, $num_sections);

foreach ($sections as $key => $section) {
    print_r($key);
    $sections[$key]['students_number'] += $students_per_section;
    if ($extra_students > 0) {
        $sections[$key]['students_number'] += 1;
        $extra_students--;
    }
}

// Print the sections after distribution
echo "\nSections After Distribution:\n" . "<br>";
foreach ($sections as $section) {
    echo "ID: {$section['id']}, Name: {$section['name']}, Students: {$section['students_number']}\n" . "<br>";
}

// Update the data in the database
foreach ($sections as $section) {
    // $sql = "UPDATE section SET students_number = {$section['students_number']} WHERE id = {$section['id']}";
    // if ($conn->query($sql) !== TRUE) {
    //     echo "Error updating record: " . $conn->error;
    // }
}

// Delete the last section from the database
$sql = "DELETE FROM section WHERE id = {$last_section['id']}";
// if ($conn->query($sql) !== TRUE) {
//     echo "Error deleting record: " . $conn->error;
// }

// Close the connection
$conn->close();
?> -->