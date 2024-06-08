<?php
require "../connect.php";

$teacher = $_POST['teacher'];
$subject_id = $_POST['subject_id'];
$section = $_POST['section'];
$day = $_POST['day'];
$time = $_POST['time'];
$major_id = $_POST['major_id'];
$semester = $_POST['semester'];
// echo $teacher;
// echo '<br>';
// echo $subject_id;
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
function timeToNumber($time) {
    $parts = explode('_', $time);
    // echo intval($parts[0]) ;
    return intval($parts[1]);
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
$sqlTeacherClasses = "SELECT * FROM schedule WHERE techer='$teacher' GROUP by subject_name ";
$result = $conn->query($sqlTeacherClasses);

$subject_count = 0;
$subject_sections = [];
$class_times = [];
while ($row = $result->fetch_assoc()) {
    $subject_count++;
    $class_times[] = ['day' => $row['day'], 'time' => timeToNumber($row['time'])];

    if (!isset($subject_sections[$row['subject_id']])) {
        $subject_sections[$row['subject_id']] = 0;
    }
    $subject_sections[$row['subject_id']]++;
}

$max_subjects = getMaxSubjects($teacher);

// تحقق من شرط عدد المواد
if ($subject_count >= $max_subjects) {
    echo "هذا الأستاذ لا يمكنه تدريس أكثر من $max_subjects مواد.";
    exit;
}


// تحقق من شرط الراحة بين المحاضرات
$current_time = timeToNumber($time);
$sub_time=substr($time,0,2);
foreach ($class_times as $class_time) {
    if ($class_time['day'] == $day) {
        if ($class_time['time']==$sub_time) {
            // print_r($class_times);
            // print_r($sub_time);
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
// echo substr($time,0,2);
$parts =  explode('_', $_POST['time']);
$part1= $parts[0];
$start='';
if(str_contains($part1,':')){
    $temp= explode(':', $part1);
    $start=$temp[0];
    }else{
        $start=$part1;
        }
        echo $start;
        $sqlTeacherTimeConflict = "SELECT * FROM schedule WHERE techer='$teacher' AND day='$day' and time like '$start%' ";
$result = $conn->query($sqlTeacherTimeConflict);
if ($result->num_rows > 0) {
    // print_r($result->fetch_array());
    echo "هذا الأستاذ لديه محاضرة أخرى في نفس الوقت.";
    exit;
}

// تحقق من شرط المواد العملية
if (strpos(strtolower($subject_id), 'lab') !== false && (strpos($teacher, 'Mr') === false && strpos($teacher, 'Mrs') === false)) {
    echo "المواد العملية يجب أن يدرسها أستاذ    Mr أو Mrs.";
    exit;
}


$sqlTeacherClasses1 = "SELECT COUNT(section) as 'count' FROM schedule WHERE techer='$teacher' and subject_id=$subject_id GROUP by subject_id ";

$result1 = $conn->query($sqlTeacherClasses1);
$row=$result1->fetch_assoc();
if($result1->num_rows >0)
if( isset($row['count']) ){
    // echo $row['count'].'<br>';
    // print_r($row);
    if($row['count']>=3){

        // if (isset($subject_sections[$subject_id]) && $subject_sections[$subject_id] >= 3) {
            echo "هذا الأستاذ لا يمكنه تدريس أكثر من 3 شعب لهذه المادة.";
            exit;
        }
}




}
echo "ok";
?>
