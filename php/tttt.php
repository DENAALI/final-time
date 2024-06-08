<?php
// include '../connect.php';
// require_once '../../connect.php';
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "timetable";
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
$major_id = 0;
$schedual = [];
$_POST['major1']=0;
$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);
$sql123 = "SELECT * FROM statistics";
$result123 = $conn->query($sql123);
if(mysqli_num_rows($result123)!=0){
if(mysqli_num_rows($result)==0)
 {
    $major_id = $_POST['major1'];
    $level = $_POST['level1']=2;
    $semester = $_POST['semester1']=1;

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
    $sql12 = "SELECT `course id`, `course name`,day FROM tims GROUP BY `course name`";
    $sql = "SELECT * FROM statistics";
    $result1 = $conn->query($sql12);

    $courses = [];
    $conflect = "";
    
    echo "<br>";
    echo $semester;
    echo "<br>";
    echo $level;
    echo "<br>";
    echo $major_id;
    echo "<table>";
    echo "<tr>";
    echo "<th>";
    echo "</th>";
    echo "<th>";
    echo "</th>";
    echo "<th>";
    echo "</th>";
    echo "</tr>";
    
    
    while ($row = $result1->fetch_assoc()) {
        $subject = "SELECT * FROM subjects WHERE semester=$semester and   subject_id = " . $row['course id'];
        $student_count = 0;
        $sub_res = $conn->query($subject);
        
        if (mysqli_num_rows($sub_res) > 0) {
            $result = $conn->query($sql);
            while ($stat_res = $result->fetch_assoc()) {
                if ($stat_res['subject_num'] == $row['course id']) {
                    $student_count = $stat_res['num_of_study'];
                }
            }

            if ($student_count != 0) {
                $field = $sub_res->fetch_assoc();
                $sections_needed = ceil($student_count / $field['Capacity']);
                $remaining_students = $student_count;

                for ($i = 1; $i <= $sections_needed; $i++) {
                    $students_in_section = min($field['Capacity'], $remaining_students);
                    $remaining_students -= $students_in_section;
                    $select_type="SELECT type_name FROM `subjects` WHERE subject_id=".$row['course id']."";
                    $type_result = $conn->query($select_type);
                    $sub_type=$type_result->fetch_assoc()['type_name'];
                    $courses[] = [
                        'course_id' => $row['course id'],
                        'course_name' => $row['course name'],
                        'section' => $i,
                        'students_count' => $students_in_section,
                        'type'=>$sub_type
                    ];
                }

                echo "<tr>";
                echo "<td>" . $row['course id'] . "</td>";
                echo "<td>" . $row['course name'] . "</td>";
                echo "<td>" . $sections_needed . "</td>";
                echo "</tr>";
            }else{
                if($row['day']){

                    $select_type="SELECT type_name FROM `subjects` WHERE subject_id=".$row['course id']."";
                    $type_result = $conn->query($select_type);
                    $sub_type=$type_result->fetch_assoc()['type_name'];
                    $courses[] = [
                        'course_id' => $row['course id'],
                        'course_name' => $row['course name'],
                        'section' => 1,
                        'students_count' => 0,
                        'type'=>$sub_type
                    ];
                }
            }
        }
    }

    // دالة لتوزيع القاعات
    function assignHall($courses, $halls) {
        $schedule = [];
        $hallUsage = []; // مصفوفة لتتبع استخدام القاعات

        foreach ($courses as $course) {
            $courseType = $course['type']=='laboratory'  ? 'laboratory' : 'theoretical';
            $assigned = false;

            foreach ($halls[$courseType] as $hall) {
                $timeSlots = explode('-', $course['day']); // تقسيم الأيام إلى قائمة
                $canAssign = true;

                // تحقق من جميع الأيام لكل فترة زمنية
                foreach ($timeSlots as $day) {
                    $timeSlot = $day . ' ' . $course['hour'];
                    if (isset($hallUsage[$hall['hall_name']][$timeSlot])) {
                        $canAssign = false;
                        break;
                    }
                }

                if ($canAssign) {
                    // تخصيص القاعة للدورة
                    foreach ($timeSlots as $day) {
                        $timeSlot = $day . ' ' . $course['hour'];
                        $hallUsage[$hall['hall_name']][$timeSlot] = true; // تعيين القاعة على أنها مستخدمة في هذا الوقت
                    }

                    $schedule[] = [
                        'day' => $course['day'],
                        'hour' => $course['hour'],
                        'hall_name' => $hall['hall_name'],
                        'course_id' => $course['course_id'],
                        'course_name' => $course['course_name'],
                        'section' => $course['section'],
                        'students_count' => $course['students_count']
                    ];
                    $assigned = true;
                    break;
                }
            }

            // إذا لم يتم تخصيص قاعة، قم بطباعة رسالة خطأ أو التعامل مع المشكلة حسب الحاجة
            if (!$assigned) {
                echo "Error: Could not assign hall for course " . $course['course_name'] . " (Section " . $course['section'] . ") at " . $course['day'] . " " . $course['hour'] . "\n";
            }
        }
        return $schedule;
    }

    // جلب الأوقات لكل شعبة وتوزيع القاعات
    foreach ($courses as &$course) {
        $sqlTimes = "SELECT * FROM tims WHERE `course id` = " . $course['course_id'] . " AND `section` = " . $course['section'];
        $resultTimes = $conn->query($sqlTimes);

        if ($resultTimes->num_rows > 0) {
            while ($timeRow = $resultTimes->fetch_assoc()) {
                $course['day'] = $timeRow['day'];
                $course['hour'] = $timeRow['hour'];
            }
        }
    }

    // توزيع القاعات
    $schedule = assignHall($courses, $halls);
    $schedual = $schedule;

    // عرض الجدول النهائي
    echo "<pre>";
    foreach ($schedule as $details) {
        echo "Day: " . $details['day'] . "\n";
        echo "Hour: " . $details['hour'] . "\n";
        echo "Hall Name: " . $details['hall_name'] . "\n";
        echo "Course ID: " . $details['course_id'] . "\n";
        echo "Course Name: " . $details['course_name'] . "\n";
        echo "Section: " . $details['section'] . "\n";
        echo "Students Count: " . $details['students_count'] . "\n";
        echo "----------------------------------------\n";
        $day=$details['day'];
        $Hour=$details['hour'];
        $Hall=$details['hall_name'];
        $id=$details['course_id'];
        $name=$details['course_name'];
        $section=$details['section'];
        $stu_count=$details['students_count'];

        $insert_scedual=" 
        INSERT INTO `schedule`( `subject_id`, `subject_name`, `section`, `time`, `day`, `hall`, `student_num`) VALUES 
                ($id,'$name','$section','$Hour','$day','$Hall',$stu_count) ";
                if($conn->query($insert_scedual)){
                    echo "don\n";
                }else{
                    // echo "error\n";

                }

    }
    echo "</pre>";
?>
<script>
    window.location.href = "../Create_Table.php";
</script>
<?php
    echo "<button class='btn'>next</button>";
    header('location:../Create_Table.php');
}else{
    ?>
    <script>
    window.location.href = "../Create_Table.php";
    </script>
    <?php
    }
}   

$conn->close();
?>