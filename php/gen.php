<!-- <?php

// // include '../connect.php';
// // require_once '../../connect.php';
// $dbServername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "timetable";
// $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
// $major_id = 0;
// $schedual = [];

// if (isset($_POST['major1'])) {
//     $major_id = $_POST['major1'];
//     // $level = $_POST['level1'];
//     $semester = $_POST['semester1'];
    
//     if ($_POST['major1'] == 1) {
//         $major = '221';
//     } elseif ($_POST['major1'] == 2) {
//         $major = '223';
//     } elseif ($_POST['major1'] == 3) {
//         $major = '222';
//     }

//     // جلب بيانات القاعات
//     $sqlHalls = "SELECT * FROM hall";
//     $resultHalls = $conn->query($sqlHalls);

//     $halls = [];
//     if ($resultHalls->num_rows > 0) {
//         while ($row = $resultHalls->fetch_assoc()) {
//             $halls[$row['type_name']][] = $row;
//         }
//     }

//     // جلب بيانات الدورات
//     $sql12 = "SELECT `course id`, `course name` FROM tims GROUP BY `course name`";
//     $sql = "SELECT * FROM statistics";
//     $result1 = $conn->query($sql12);

//     $courses = [];
//     $conflect = "";
//         $scedual_select="SELECT *,COUNT(subject_name) as 'count' FROM `schedule` where subject_id like '$major%' GROUP BY subject_name";
//         $scedual_res=$conn->query($scedual_select);
//     while ($row = $scedual_res->fetch_assoc()) {
             
//         $student_count =0;
//         $result = $conn->query($sql);
//         while ($stat_res = $result->fetch_assoc()) {
//                 if ($stat_res['subject_num'] == $row['subject_id']) {
//                     $student_count = $stat_res['num_of_study'];
//                 }
//             }
//             $selectsub = "SELECT * FROM `subjects` WHERE semester=$semester and  subject_id like '$major%' ";
//             $sub_result = $conn->query($selectsub);
//             while($row2=$sub_result->fetch_assoc()) {

//                 // if (mysqli_num_rows($sub_result) > 0) {
//                     if($row['subject_id']==$row2['subject_id'] ){

//                         echo "<tr>";
//                         echo "<td>" . $row['subject_id'] . "</td>";
//                         echo "<td>" . $row['subject_name'] . "</td>";
//                         echo "<td id='count".$row['subject_id']."' >" . $row['count'] . "</td>";
//                         echo "<input type='hidden' id='idofrow' value=''>";
//                         echo "<td>" . $student_count. "</td>";
//                         echo "<td><button onclick='update(".$row['subject_id'].")' id='btnedit".$row['subject_id']."' class='btn'>delete 1 section</button></td>";
//                         echo "</tr>";
//                     }else{
//                         // echo "<tr>";
//                         // echo "<td>" . $row2['subject_id'] . "</td>";
//                         // echo "<td>" . $row2['name'] . "</td>";
//                         // echo "<td id='count".$row2['subject_id']."' >0</td>";
//                         // echo "<input type='hidden' id='idofrow' value=''>";
//                         // echo "<td>0</td>";
//                         // echo "<td></td>";
//                         // echo "</tr>";

//                     }
//                     // }
//                 }

//     }

//     // دالة لتوزيع القاعات

//     echo "<button class='btn'>next</button>";
// }

// $conn->close();
?> -->


<?php


$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "timetable";
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
$major_id = 0;
$schedual = [];
if (isset($_POST['major1'])) {
    $major_id = $_POST['major1'];
    // $level = $_POST['level1'];
    $semester = $_POST['semester1'];
    
    if ($_POST['major1'] == 1) {
        $major = '221';
    } elseif ($_POST['major1'] == 2) {
        $major = '223';
    } elseif ($_POST['major1'] == 3) {
        $major = '222';
    }
    // جلب بيانات القاعات
    $sqlHalls = "SELECT * FROM hall";
    $resultHalls = $conn->query($sqlHalls);

    $halls = [];
    if ($resultHalls->num_rows > 0) {
        while ($row = $resultHalls->fetch_assoc()) {
            $halls[$row['type_name']][] = $row;
        }
    }
    // جلب بيانات الدورات

    $sql12 = "SELECT * FROM tims where `course name`= GROUP BY `course name`";
    // $result1 = $conn->query($sql12);
    $sql = "SELECT * FROM statistics";

    $courses = [];
    $conflect = "";

    $scedual_select = "SELECT *, COUNT(subject_name) as 'count',SUM(student_num) as 'sum' FROM `schedule` where subject_id like '$major%'  GROUP BY subject_name";
    $scedual_res = $conn->query($scedual_select);

    $schedule_courses = [];
    while ($row = $scedual_res->fetch_assoc()) {
        $schedule_courses[$row['subject_id']] = $row;
    }

    $selectsub = "SELECT * FROM `subjects` WHERE semester=$semester AND subject_id like '$major%' and major_id= $major_id";
    $sub_result = $conn->query($selectsub);
    $student_count = 0;
    while ($row2 = $sub_result->fetch_assoc()) {
        $subject_id = $row2['subject_id'];
        $subject_name = $row2['name'];
        if (isset($schedule_courses[$subject_id])) {
            $schedule_course = $schedule_courses[$subject_id];
            $count = $schedule_course['count'];
            $student_count = $schedule_course['sum'];
        } else {
            $student_count = 0;
            $count = 0;
            // $sql12 = "SELECT * FROM tims where `course name`=$subject_id and section=1 ";
            // $result1 = $conn->query($sql12);
            // $time_row=$result1->fetch_assoc();
            // $insert_scedual=" 
            // INSERT INTO `schedule`( `subject_id`, `subject_name`, `section`, `time`, `day`, `hall`, `student_num`) VALUES 
            //         (".$time_row['course id'].",'".$time_row['course name']."','".$time_row['section']."','".$time_row['hour']."','".$time_row['day']."','$Hall',$stu_count) ";
            //         if($conn->query($insert_scedual)){}
        }
        
        // $result = $conn->query($sql);
        // while ($stat_res = $result->fetch_assoc()) {
        //     if ($stat_res['subject_num'] == $subject_id) {

        //         $student_count = $stat_res['num_of_study'];

        //     }
        // }
        echo "<tr id='row" . $subject_id . "' >";
        echo "<td>" . $subject_id . "</td>";
        echo "<td>" . $subject_name . "</td>";
        if ($count == 0) {
            echo "<td style='    
            ' id='count" . $subject_id . "' >1</td>";
            $count=1;
        }else{

            echo "<td id='count" . $subject_id . "' >" . $count . "</td>";
        }
        echo "<input type='hidden' id='idofrow' value=''>";
        echo "<td>" . $student_count . "</td>";
        echo "<td>";
        // if ($count > 0) {
            echo "<button onclick='update(event," . $subject_id . ")' id='btnedit" . $subject_id . "' class='btn btn-primary ' style='' >delete 1 section</button>";
        // }
        echo "</td>";
        echo "</tr>";
        $student_count=0;
    }

    echo "<button class='btn'>next</button>";
}

$conn->close();
?>

<!-- <script>
// Javascript function for update button
function update(subjectId) {
    // Add your update logic here
}
</script> -->
