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

$semester=1;
$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);
$sql123 = "SELECT * FROM statistics";
$result123 = $conn->query($sql123);
$subject = "SELECT *,count(name) FROM subjects WHERE major_id=1 and semester=1 and year=1 group by name";
$student_count = 0;
$sub_res = $conn->query($subject);



// تعريف الأوقات لكل قسم

$day12=[
    'Sunday','Tuesday','Thursday'
];

$day34=[
    'Monday','Wednesday'

];
function getDayBySection($section, $days) {
    return $days[($section - 1) % count($days)];
}

$time_1 = [

    '10_11',
    '11_12',
    '12_13',
    '13_14',
 
];

$time_2 = [
    '8_10',
    '12_14',
    '14_16',
];
$time_3 = [
    '8-9:30',
    '9:30_11',
    '11_12:30',
    '12:30_14',
    '14_15:30',
];
$sqlHalls = "SELECT * FROM hall";
    $resultHalls = $conn->query($sqlHalls);

    $halls = [];
    if ($resultHalls->num_rows > 0) {
        while ($row = $resultHalls->fetch_assoc()) {
            $halls[$row['type_name']][] = $row;
        }
    }
// استعلام لاختيار المواد حسب الشروط
// $select_sub = "SELECT * FROM `subjects` WHERE semester = $semester AND major_id = $i AND year = $j";

$majors = ['221', '223', '222'];
$student_count = 0;

// الدورة تمثل السنة
for ($i = 1; $i <= 3; $i++) {
    // $semester تمثل الترم
    for ($j = 1; $j <= 4; $j++) {
        $subject_id = $majors[$i - 1];
        $select_sub = "SELECT * FROM `subjects` WHERE subject_id like '$subject_id%' and semester = $semester AND major_id = $i AND year = $j";
        $result_sub = $conn->query($select_sub);

        while ($sub = $result_sub->fetch_assoc()) {
            if(str_starts_with($sub['name'],'Graduation'))
            continue;
            $sql123 = "SELECT * FROM statistics";
            $result123 = $conn->query($sql123);

            while ($row = $result123->fetch_assoc()) {
                if ($row['subject_num'] == $sub['subject_id']) {
                    $student_count = $row['num_of_study'];
                }
            }
            $flage=true;
            foreach ($schedual as $item) {
                if($item['course_id']==$sub['subject_id']){
                    $flage=false;
                }
            }
            if($flage)
            if ($student_count != 0) {
                $sections_needed = ceil($student_count / $sub['Capacity']);
                // echo $student_count.'   ';
                $remaining_students = $student_count;

                // تحديد الأوقات لكل شعبة
                for ($section = 1; $section <= $sections_needed; $section++) {
                    // اختيار الجدول الزمني المناسب لكل قسم
                    $times = $time_1;//($i == 1) ? $time_1 : (($i == 2) ? $time_2 : $time_3);

                    // تخصيص جدول زمني لكل مادة
                    // foreach ($times as $index => $time) {
                        if ($remaining_students <= 0) break;

                        // $start_time = $time;
                        
                        $schedual[] = [
                            'day' => '', // يجب تحديد اليوم هنا
                            'hour' => '',
                            'course_id' => $sub['subject_id'],
                            'semester' => $sub['semester'],
                            'pre_sub' => $sub['pre_sub_num'],
                            'major_id' => $sub['major_id'],
                            'type' => $sub['type_name'],
                            'year' => $sub['year'],
                            'course_name' => $sub['name'],
                            'section' => $section,
                            'students_count' => min($remaining_students, $sub['Capacity']),
                        ];

                        $remaining_students -= $sub['Capacity'];
                    // }
                }
                
                }else{
                    $schedual[] = [
                        'day' => '', // يجب تحديد اليوم هنا
                        'hour' => '',
                        'course_id' => $sub['subject_id'],
                        'pre_sub' => $sub['pre_sub_num'],
                        'semester' => $sub['semester'],
                        'major_id' => $sub['major_id'],
                        'type' => $sub['type_name'],
                        'year' => $sub['year'],
                        'course_name' => $sub['name'],
                        'section' => 1,
                        'students_count' => 0,
                    ];
                }
                $student_count=0;
                }
                
                
                $labindex=0;
                    for ($section = 1; $section <= $sections_needed; $section++) {

                        $times = $time_2;
                        if((count($times)-1)<=($section-1)&&$labindex==0){
                            $labindex++;
                        }
                        if($labindex==0){
                            $start=$times[$section-1];
                        $index1=$section-1;
                        }else{
                            $start=$times[$labindex-1];
                        $index1=$labindex;
                        }
                            foreach ($schedual as $key => $item) {
                                if($item)
                                if($item['semester']==$semester&&$item['major_id']==$i&&$item['year']==$j&&$section==$item['section']&&str_starts_with($item['course_id'],$subject_id)){
                                    if($item['type']=='laboratory'){
                                        if($j==1||$j==2){

                                            $schedual[$key]['day']=getDayBySection($section, $day12);
                                        }else{
                                            $schedual[$key]['day']=getDayBySection($section,$day34);

                                        }
                                        while (hasTimeConflict($start, $schedual, $item['pre_sub'],$item['section'],$item['course_id'])) {
                                            $index1++;
                                            if (count($times) <= $index1) {
                                                $index1 = 0;
                                            }
                                            $start = $times[$index1];
                                        }
                                        $schedual[$key]['hour'] = $start;
                                        $index1++;
                                        if (count($times) <= $index1) {
                                            $index1 = 0;
                                        }
                                        $start = $times[$index1];
                                    }
                                }
                            }
                        
                            }
                        $labindex=0;
                        
                        for ($section = 1; $section <= $sections_needed; $section++) {
                            $times=$time_1;
                            // if(isset($times[$section-1])){

                            //     $start=$times[$section-1];
                            //     $index=$section-1;
                            // }else{
                            //     $start=$times[0];
                            //     $index=0;
                            // }

                            if((count($times)-1)<=($section-1)&&$labindex==0){
                                $labindex++;
                            }
                            if($labindex==0){
                                $start=$times[$section-1];
                            $index1=$section-1;
                            }else{
                                $start=$times[$labindex-1];
                            $index1=$labindex;
                            }
                            
                            foreach ($schedual as $key => $item) {
                                
                                if($item['semester']==$semester&&str_starts_with($item['course_id'],$subject_id)&&$item['major_id']==$i&&$item['year']==$j&&$section==$item['section']){
                                    if($item['type']!='laboratory'){
    
                                        // $index++;
                                        if($j==1||$j==2){
                                            // if(!isset($times[$index])){
                                            //     $index=0;
                                            //     }
                                            //     $schedual[$key]['hour']=$start;
                                            //     $start=$times[$index];
                                            $schedual[$key]['day']='Sunday-Tuesday-Thursday';
                                        }else{
                                            

                                        }
                                        while (hasTimeConflict($start, $schedual, $item['pre_sub'],$item['section'],$item['course_id'])) {
                                            $index1++;
                                            if (count($times) <= $index1) {
                                                $index1 = 0;
                                            }
                                            $start = $times[$index1];
                                        }
                                        $schedual[$key]['hour'] = $start;
                                        $index1++;
                                        if (count($times) <= $index1) {
                                            $index1 = 0;
                                        }
                                        $start = $times[$index1];
        
                                    }
                                }
                            }
                        }
                        $labindex=0;
                        for ($section = 1; $section <= $sections_needed; $section++) {
                            $times=$time_3;
                            if(count($times)<=($section-1)&&$labindex==0){
                                $labindex=($section-1);
                            }
                            if($labindex==0){

                                $start=$times[$section-1];
                            $index1=$section-1;
                            }else{
                                $start=$times[$labindex-1];
                            $index1=$labindex-1;
                            }
                            // $start=$times[$section-1];
                            $index=$section-1;
                            foreach ($schedual as $key => $item) {
    
                                if($item['semester']==$semester&&str_starts_with($item['course_id'],$subject_id)&&$item['major_id']==$i&&$item['year']==$j&&$section==$item['section']){
                                    if($item['type']!='laboratory'){
    
                                        if($j==1||$j==2){
                                        }else{


                                            while (hasTimeConflict($start, $schedual, $item['pre_sub'],$item['section'],$item['course_id'])) {
                                                $index1++;
                                                if (count($times) <= $index1) {
                                                    $index1 = 0;
                                                }
                                                $start = $times[$index1];
                                            }
                                            $schedual[$key]['hour'] = $start;
                                            $index1++;
                                            if (count($times) <= $index1) {
                                                $index1 = 0;
                                            }
                                            $start = $times[$index1];

                                            
                                            // $schedual[$key]['day']='Sunday-Tuesday-Thursday';
                                            $schedual[$key]['day']='Monday-Wednesday';

                                        }
                                        
                                    
                                    }
                                }
                            }
                            
                        
                    }
    }
}
function hasTimeConflict($time, $schedual, $pre_sub,$section,$subject_id) {
    foreach ($schedual as $item) {
        // $item_start_time = strtotime(explode('-', $item['hour'])[0]);
        // $item_end_time = strtotime(explode('-', $item['hour'])[1]);
        if ($item['pre_sub'] == $pre_sub && $item['pre_sub']==$subject_id && $section==$item['section']) {
            if(str_starts_with($item['hour'],substr($time,0,2))){
                echo substr($time,0,2);
                return true;
                }
        }
    }
    return false;
}
// إظهار الجدول الزمني
// for ($section = 1; $section <= $sections_needed; $section++) {
//     $times = $time_1;

$schedule = assignHall($schedual, $halls);
 $schedule;
//  echo "<table border=1 style='padding: 5;
//     text-align: center;' >";
//  echo "<tr>";
//  echo "<th>Subject ID</th>";
//  echo "<th>Name</th>";
//  echo "<th>Section</th>";
//  echo "<th>Hour</th>";
//  echo "<th>year</th>";
//  echo "<th>Day</th>";
//  echo "<th>Hall</th>";
//  echo "<th>Student numper</th>";
//  echo "</tr>";
$select="select * from schedule ";
$res=$conn->query($select);
if($res->num_rows<=0)
foreach ($schedule as $item) {
    // if($item['semester']==$semester&&$item['major_id']==1&&$item['year']==2) {
        // if($item['type']!='laboratory'&&$item['section']==1){
        if(true){

            // echo "<tr>";
            // echo "<td>" . $item['course_id'] . "</td>";
            // echo "<td>" . $item['course_name'] . "</td>";
            // echo "<td>" . $item['section'] . "</td>";
            // echo "<td>" . $item['pre_sub'] . "</td>";
            // echo "<td>" . $item['hour'] . "</td>";
            // echo "<td>" . $item['year'] . "</td>";
            // echo "<td>" . $item['day'] . "</td>";
            // echo "<td>" . $item['hall_name'] . "</td>";
            // echo "<td>" . $item['students_count'] . "</td>";
            // echo "</tr>";
        }   
// }

$day=$item['day'];
$Hour=$item['hour'];
$Hall=$item['hall_name'];
$id=$item['course_id'];
$name=$item['course_name'];
$section=$item['section'];
$stu_count=$item['students_count'];
$insert_scedual=" 
INSERT INTO `schedule`( `subject_id`, `subject_name`, `section`, `time`, `day`, `hall`, `student_num`) VALUES 
        ($id,'$name','$section','$Hour','$day','$Hall',$stu_count) ";
       
        
            if($conn->query($insert_scedual)){
                // echo "don\n";
            }else{
                // echo "error\n";
    
            }
        

}
if(isset($_POST['major1']))
{
    
    $subject_id1 = $majors[$_POST['major1']- 1];
    $select="select *,count(section) as 'count',sum(student_num) as 'sum' from schedule where subject_id like '$subject_id1%'  GROUP BY subject_name";
    $result = $conn->query($select);

    while($row=$result->fetch_assoc()){
        $subject_id=$row['subject_id'];
        echo "<tr id='row" . $subject_id . "' >";
            echo "<td>" . $row['subject_id'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "<td id='count" . $subject_id . "' >" .$row['count']. "</td>";
            echo "<td>" . $row['sum'] . "</td>";
            echo "<td>";
            // if ($count > 0) {
                echo "<button onclick='update(event," . $subject_id . ")' id='btnedit" . $subject_id . "' class='btn btn-primary ' style='' >delete 1 section</button>";
            // }
            echo "</td>";
            echo "<td>";
            // if ($row['sum'] != 0) {
                echo "<button onclick='update1(event," . $subject_id . ")' id='btnadd" . $subject_id . "' class='btn btn-success ' style='' >add 1 section</button>";
            // }
            echo "</td>";
            echo "</tr>";


    }

}

// }
// echo "</table>";



$conn->close();

$insert="
INSERT INTO `optnal`( `name`, `subject_id`, `pre`, `DS`, `SE`, `CS`) VALUES 


('Data Structures Lab','2211212','2211121',1,1,0)
,('Object-oriented programming','2211321','2211123',1,0,0)
,('Cyber Security Fundamentals','2212251','2212351',1,0,0)
,('Digital Image Processing','2211362','2211431',1,0,0)




,('Cloud computing and its applications','2231371','2222365',1,0,0)
,('Data Structures Lab','2201212','2211121',1,1,0)
,(' Programming in Java ','2221221','2211123',0,1,1)
,('Java Programming Lab ','2221222','2221222',0,1,0)
,(' Programming in Java ','2221221','2211123',0,1,1)


,(' Data science  ','2221341','2212271',0,0,1)
,('Human-Computer Interaction ','2221371','2221461',0,0,1)
,('Internet Application Programming','2221223','2211263',0,0,1)
";

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
                    'year' => $course['year'],
                    'hour' => $course['hour'],
                    'pre_sub' => $course['pre_sub'],
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
            $schedule[] = [
                'day' => $course['day'],
                'year' => $course['year'],
                'hour' => $course['hour'],
                'hall_name' => '',
                'course_id' => $course['course_id'],
                'course_name' => $course['course_name'],
                'section' => $course['section'],
                'students_count' => $course['students_count']
            ];
            // echo "Error: Could not assign hall for course " . $course['course_name'] . " (Section " . $course['section'] . ") at " . $course['day'] . " " . $course['hour'] . "\n";
        }
    }
    return $schedule;





}



?>