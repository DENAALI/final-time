<?php
require "../connect.php";

$teacher = $_POST['teacher'];
$course_id = $_POST['course_id'];
$section = $_POST['section'];
$day = $_POST['day'];
$time = $_POST['time'];
$major_id = $_POST['major_id'];
$semester = $_POST['semester'];
// echo $teacher;
// echo '<br>';
// echo $course_id;
// echo '<br>';
// echo $section;
// echo '<br>';
// echo $day;
// echo '<br>';
// echo $time;
// echo '<br>';
// echo $major_id;
// echo '<br>';
// echo $semester;
// echo '<br>';
// تحويل الأوقات النصية إلى أرقام
function timeToNumber($time,$i) {
    $parts = explode('-', $time);
    $start = intval(str_replace(':', '', $parts[0]));
    $end = intval(str_replace(':', '', $parts[1]));
    return $i==1?$start:$end;
}

// تحقق من عدد المواد التي يمكن أن يدرسها الأستاذ بناءً على نوعه
function getMaxSubjects($teacher_name) {
    if (strpos($teacher_name, 'prof') !== false) {
        return 3;
    } elseif (strpos($teacher_name, 'Dr') !== false) {
        return 4;
    } elseif (strpos($teacher_name, 'Mr') !== false || strpos($teacher_name, 'Mrs') !== false) {
        return 5;
    }
    return 0;
}
if($teacher!="" && $teacher!="non"){


// تحقق من الشروط
$sqlTeacherClasses = "SELECT * FROM summer WHERE teacher='$teacher' GROUP by course_name ";
$result = $conn->query($sqlTeacherClasses);

$subject_count = 0;
$subject_sections = [];
$class_times = [];
while ($row = $result->fetch_assoc()) {
    $subject_count++;
    $class_times[] = ['day' => $row['day'], 'time' => timeToNumber($row['time'],2)];

    if (!isset($subject_sections[$row['course_id']])) {
        $subject_sections[$row['course_id']] = 0;
    }
    $subject_sections[$row['course_id']]++;
}

$max_subjects = getMaxSubjects($teacher);

// تحقق من شرط عدد المواد
if ($subject_count >= $max_subjects) {
    echo "هذا الأستاذ لا يمكنه تدريس أكثر من $max_subjects مواد.";
    exit;
}


// تحقق من شرط الراحة بين المحاضرات
$current_time = timeToNumber($time,1);
$sub_time=timeToNumber($time,1);
foreach ($class_times as $class_time) {
    if ($class_time['day'] == $day) {
        // echo $current_time;
        // print_r($class_time);
        if ($class_time['time']==$current_time) {
            // print_r($class_times);
            // echo($current_time);
            echo "يجب أن يأخذ الأستاذ فترة راحة بين المحاضرات.";
            exit;
        }
    }
}

// تحقق من شرط عدم التضارب في الوقت

$sub_time='';
if(strlen($time)==3)
{
    $sub_time=substr($time,0,1);
}
if(strlen($time)==4)
{
    $sub_time=substr($time,0,1);
}
if(strlen($time)==5)
{
    $sub_time=substr($time,0,2);
}
if(strlen($time)>5)
{
    // $sub_time= timeToNumber($time);
    $sub_time=substr($time,0,2);
}

$sub_time=substr($time,0,4);
// echo substr($time,0,2);

$sqlTeacherTimeConflict = "SELECT * FROM summer WHERE teacher='$teacher'  and time like'$sub_time%' ";

$result = $conn->query($sqlTeacherTimeConflict);
if ($result->num_rows > 0) {
    // print_r($result->fetch_array());
    echo "هذا الأستاذ لديه محاضرة أخرى في نفس الوقت.";
    exit;
}

// تحقق من شرط المواد العملية
if (strpos(strtolower($course_id), 'lab') !== false && (strpos($teacher, 'Mr') === false && strpos($teacher, 'Mrs') === false)) {
    echo "المواد العملية يجب أن يدرسها أستاذ    Mr أو Mrs.";
    exit;
}


$sqlTeacherClasses1 = "SELECT COUNT(section) as 'count' FROM summer WHERE teacher='$teacher' and course_id=$course_id GROUP by course_id ";
// echo $sqlTeacherClasses1;
$result1 = $conn->query($sqlTeacherClasses1);
$row=$result1->fetch_assoc();
// print_r($row);
// if($result1->num_rows >0)
if( isset($row['count']) ){
    // echo $row['count'].'<br>';
    // print_r($row);
    if($row['count']>=3){

        // if (isset($subject_sections[$course_id]) && $subject_sections[$course_id] >= 3) {
            echo "هذا الأستاذ لا يمكنه تدريس أكثر من 3 شعب لهذه المادة.";
            exit;
        }
}




}
echo "ok";
?>
