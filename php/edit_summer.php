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

$time_slots_theory = [
                    
    ['start' => '10:30-11:45'],
    ['start' => '11:45-13:00'],
    ['start' => '13:00-14:15'],
    ['start' => '14:15-15:30'],
    ['start' => '15:30-16:45'],
    ['start' => '08:00-09:15'],
    ['start' => '09:15-10:30'],
];
$time_slots_lab = [
    ['start' => '08:00-09:30'],
    ['start' => '09:30-11:00'],
    ['start' => '11:00-12:30'],
    ['start' => '12:30-14:00'],
    ['start' => '14:00-15:30'],
    ['start' => '15:30-17:00'],
];
$time_1 = [

    '10:30-11:45',
    '11:45-13:00',
'13:00-14:15',
'14:15-15:30',
// '08:00-09:15',
// '09:15-10:30',
];

$time_2 = [
'08:00-09:30',
'09:00-10:30',
'09:30-11:00',
// '12:30-14:00',
// '14:00-15:30',
// '11:00-12:30',
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

$majors = ['221', '223', '222'];
$student_count = 0;

        $subject_id = '';
        $select_sub = "SELECT * FROM statistics";
        $result_sub = $conn->query($select_sub);
        $pre_sub='';
        $sections_needed=0;
        while ($sub = $result_sub->fetch_assoc()) {
            $select_aubject="SELECT * FROM `subjects` WHERE subject_id =".$sub['subject_num']." ";
            $subgect_result=$conn->query($select_aubject);
            if(isset($subgect_result->fetch_assoc()['pre_sub_num']))
            $pre_sub=$subgect_result->fetch_assoc()['pre_sub_num'];
            if(strlen($sub['subject_num'])!=7)
            continue;
            $j=intval(substr($sub['subject_num'],5,1));
            $major_id=0;
            foreach($majors as $key => $major) {
                if(substr($sub['subject_num'],0,3)==$major){
                    $major_id=$key;
                    $subject_id=$major;
                }
            }
            $sql123 = "SELECT * FROM statistics";
            $result123 = $conn->query($sql123);


                    $student_count = $sub['num_of_study'];
         
           
            if ($student_count != 0) {
                $sections_needed = ceil($student_count / 50);
                // echo $student_count.'   ';
                $remaining_students = $student_count;
                
                // تحديد الأوقات لكل شعبة
                for ($section = 1; $section <= $sections_needed; $section++) {
                    // اختيار الجدول الزمني المناسب لكل قسم
                    $times = $time_1;
                    // تخصيص جدول زمني لكل مادة
                    // foreach ($times as $index => $time) {
                        if ($remaining_students <= 0) break;
                        $schedual[] = [
                            'day' => '', // يجب تحديد اليوم هنا
                            'hour' => '',
                            'course_id' => $sub['subject_num'],
                            'pre_sub' =>$pre_sub ,
                            'major_id' => $major_id,
                            'type' => $sub['subject_type'],
                            'year' => $j,
                            'course_name' => $sub['subject_name'],
                            'section' => $section,
                            'students_count' => min($remaining_students, 50),
                        ];

                        $remaining_students -= 50;
                    // }
                }
                
                }else{
                    $schedual[] = [
                        'day' => '', // يجب تحديد اليوم هنا
                        'hour' => '',
                        'course_id' => $sub['subject_num'],
                        'pre_sub' =>$pre_sub ,
                        'major_id' => $major_id,
                        'type' => $sub['subject_type'],
                        'year' => $j,
                        'course_name' => $sub['subject_name'],
                        'section' => 1,
                        'students_count' => 0,
                    ];
                }
                $student_count=0;
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
                                
                                if($item['year']==$j&&$section==$item['section']&&$item['major_id']==$major_id&&str_starts_with($item['course_id'],$subject_id)){
                                    if($item['type']=='laboratory'){
                                        if($j==1||$j==2){

                                            $schedual[$key]['day']='Monday-Wednesday';
                                        }else{
                                            $schedual[$key]['day']="Sunday-Tuesday";

                                        }
                                        // if($labindex==0){

                                        //     $schedual[$key]['hour']=$start;
                                        //     $index1++;
                                        //     if(count($times)<=$index1){
                                        //         $index1=0;
                                        //     }
                                        //     $start=$times[$index1];
                                        
                                        // }else{
                                        //     $schedual[$key]['hour']=$start;
                                        //     $labindex++;
                                        //     if(count($times)<=$labindex){
                                        //         $labindex=0;
                                        //     }
                                        //     $start=$times[$labindex];
                                        // }
                                        
                                        while (hasTimeConflict($start,$item['type'], $schedual, $item['pre_sub'],$item['section'],$item['course_id'])) {
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
                            
                            foreach ($schedual as $key => $item)  {
                                
                                if(str_starts_with($item['course_id'],$subject_id)&&$item['major_id']==$major_id&&$item['year']==$j&&$section==$item['section']){
                                    if($item['type']!='laboratory'){
                                        $flage=false;
                                        $course_duration = 75 * 60;
                                        $start_time = strtotime(explode('-', $start)[0]);
                                        $end_time = $start_time + $course_duration;
                                        while (hasTimeConflict($start,$item['type'], $schedual, $item['pre_sub'],$item['section'],$item['course_id'])) {
                                            $index1++;
                                            if (count($times) <= $index1) {
                                                $index1 = 0;
                                            }
                                            $start = $times[$index1];
                                        }
                                        $schedual[$key]['hour'] = $start;
                                        $schedual[$key]['day']='Sunday-Monday-Tuesday-Wednesday';
                                        $index1++;
                                        if (count($times) <= $index1) {
                                            $index1 = 0;
                                        }
                                        $start = $times[$index1];

                                        // foreach ($schedual as $key => $item1) {
                                        //     if($start==$item1['hour']&&$item['pre_sub']==$item1['pre_sub']&&$item['section']==$item['section']){

                                        //     }
                                        //     else{
                                        //         $flage = true;
                                        //         if($labindex==0){
                                        //             $schedual[$key]['day']='Sunday-Monday-Tuesday-Wednesday';
                                        //             $schedual[$key]['hour']=$start;
                                        //             $index1++;
                                        //             if(count($times)<=$index1){
                                        //                 $index1=0;
                                        //             }
                                        //             $start=$times[$index1];
                                                
                                        //         }else{
                                        //             $schedual[$key]['hour']=$start;
                                        //             $labindex++;
                                        //             if(count($times)<=$labindex){
                                        //                 $labindex=0;
                                        //             }
                                        //             $start=$times[$labindex];
                                        //         }
                                        //         break;
                                                
                                        //     }
                                        // }
                                     
        
                                    }
                                }
                            }
                        }
                       
                        
                    }
    
// }
// Function to check time conflict
function hasTimeConflict($time,$type, $schedual, $pre_sub,$section,$subject_id) {
    foreach ($schedual as $item) {
        // $item_start_time = strtotime(explode('-', $item['hour'])[0]);
        // $item_end_time = strtotime(explode('-', $item['hour'])[1]);
        // return true;
       
        if ($item['pre_sub'] == $pre_sub && $item['hour'] == $time&&$section==$item['section']&&$item['course_id']!=$subject_id) {
            // if($type=='laboratory')
            // {
            //     if(){}
            // }
            return true;
        }
    }
    return false;
}

// إظهار الجدول الزمني
// for ($section = 1; $section <= $sections_needed; $section++) {
//     $times = $time_1;

$schedule = assignHall($schedual, $halls);
 $schedule;
 echo "<table border=1 style='padding: 5;
    text-align: center;' >";
 echo "<tr>";
 echo "<th>Subject ID</th>";
 echo "<th>Name</th>";
 echo "<th>Section</th>";
//  echo "<th>pre_sub</th>";
 echo "<th>Hour</th>";
 echo "<th>year</th>";
 echo "<th>Day</th>";
 echo "<th>Hall</th>";
 echo "<th>Student numper</th>";
 echo "</tr>";
$select="select * from schedule ";
$res=$conn->query($select);
// if($res->num_rows<=0)
foreach ($schedule as $item) {
    // if($item['semester']==$semester&&$item['major_id']==1&&$item['year']==2) {
        // if($item['type']!='laboratory'&&$item['section']==1){
        if(true){

            echo "<tr>";
            echo "<td>" . $item['course_id'] . "</td>";
            echo "<td>" . $item['course_name'] . "</td>";
            echo "<td>" . $item['section'] . "</td>";
            echo "<td>" . $item['pre_sub'] . "</td>";
            echo "<td>" . $item['hour'] . "</td>";
            echo "<td>" . $item['year'] . "</td>";
            echo "<td>" . $item['day'] . "</td>";
            echo "<td>" . $item['hall_name'] . "</td>";
            echo "<td>" . $item['students_count'] . "</td>";
            echo "</tr>";
        }   
}
echo "</table>";
// $day=$item['day'];
// $Hour=$item['hour'];
// $Hall=$item['hall_name'];
// $id=$item['course_id'];
// $name=$item['course_name'];
// $section=$item['section'];
// $stu_count=$item['students_count'];
// $insert_scedual=" 
// INSERT INTO `schedule`( `subject_id`, `subject_name`, `section`, `time`, `day`, `hall`, `student_num`) VALUES 
//         ($id,'$name','$section','$Hour','$day','$Hall',$stu_count) ";
       
        
//             // if($conn->query($insert_scedual)){
//             //     // echo "don\n";
//             // }else{
//             //     // echo "error\n";
    
//             // }
        

// }
// if(isset($_POST['major1']))
// {
    
//     $subject_id1 = $majors[$_POST['major1']- 1];
//     $select="select *,count(section) as 'count',sum(student_num) as 'sum' from schedule where subject_id like '$subject_id1%'  GROUP BY subject_name";
//     $result = $conn->query($select);

//     while($row=$result->fetch_assoc()){
//         $subject_id=$row['subject_id'];
//         echo "<tr id='row" . $subject_id . "' >";
//             echo "<td>" . $row['subject_id'] . "</td>";
//             echo "<td>" . $row['subject_name'] . "</td>";
//             echo "<td id='count" . $subject_id . "' >" .$row['count']. "</td>";
//             echo "<td>" . $row['sum'] . "</td>";
//             echo "<td>";
//             // if ($count > 0) {
//                 echo "<button onclick='update(event," . $subject_id . ")' id='btnedit" . $subject_id . "' class='btn btn-primary ' style='' >delete 1 section</button>";
//             // }
//             echo "</td>";
//             echo "<td>";
//             // if ($row['sum'] != 0) {
//                 echo "<button onclick='update1(event," . $subject_id . ")' id='btnadd" . $subject_id . "' class='btn btn-success ' style='' >add 1 section</button>";
//             // }
//             echo "</td>";
//             echo "</tr>";


//     }

// }

// }

if(isset($_POST['major1'])){
    $major='';
    if ($_POST['major1'] == 1) {
        $major = '221';
    } elseif ($_POST['major1'] == 2) {
        $major = '223';
    } elseif ($_POST['major1'] == 3) {
        $major = '222';
    }
    $sql = "SELECT * FROM summer";
    $result = $conn->query($sql);
    if($result->num_rows==0){
        foreach ($schedule as $entry) {
    
    
            $Course_id =$entry['course_id'];
            $Course_name =$entry['course_name'];
            $Section=$entry['section'];
            $Time   =$entry['hour'];
            $Days   =$entry['day'];
            $Room   =$entry['hall_name'];
            $students  =$entry['students_count'];
        $insert="INSERT INTO `summer`( `course_id`, `course_name`, `section`, `time`, `day`, `room`,students) VALUES 
        ('$Course_id','$Course_name','$Section','$Time ','$Days','$Room',$students)";
        //    echo 1231;
            if($conn->query($insert)){
            
            }
        }
    
        $sql = "SELECT * ,count(section) as 'count',sum(students)as 'sum' FROM summer where course_id like '$major%' group by course_id";
        $result = $conn->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            $sql1 = "SELECT * FROM statistics";
            $result1 = $conn->query($sql1);
            while ($row1= $result1->fetch_assoc()){
                if($row1['subject_num']==$row['course_id']){
                    // print_r($result);
                    echo "<tr id='row" . $row['course_id']. "'>
                    <td>{$row['course_id']}</td>
                    <td>{$row['course_name']}</td>
                    <td id='count" . $row['course_id']. "' >{$row['count']}</td>
                    <td>{$row['sum']}</td>";
                    echo "<td>";
            // if ($count > 0) {
                echo "<button onclick='update_summer(event," . $row['course_id'] . ")' id='btnedit" . $row['course_id'] . "' class='btn btn-primary ' style='' >delete 1 section</button>";
            // }
            echo "</td>";
            echo "<td>";
                // if ($row['sum'] != 0) {
                    echo "<button onclick='update_summer1(event," . $row['course_id'] . ")' id='btnadd" . $row['course_id'] . "' class='btn btn-success ' style='' >add 1 section</button>";
                // }
                echo "</td>";
                    echo "</tr>";
    
                }
            }
        }
    }else{
    
        $sql = "SELECT * ,count(section) as 'count',sum(students)as 'sum' FROM summer where course_id like '$major%' group by course_id";
        $result = $conn->query($sql);
        // print_r($result);
        while ($row = $result->fetch_assoc()) {
            $sql1 = "SELECT * FROM statistics";
            // $result1 = $conn->query($sql1);
            // while ($row1= $result1->fetch_assoc()){
            //     if($row1['subject_num']==$row['course_id']){
    
                echo "<tr id='row" . $row['course_id']. "'>
                <td>{$row['course_id']}</td>
                <td>{$row['course_name']}</td>
                <td id='count" . $row['course_id']. "' >{$row['count']}</td>
                <td>{$row['sum']}</td>";
                echo "<td>";
        // if ($count > 0) {
            echo "<button onclick='update_summer(event," . $row['course_id'] . ")' id='btnedit" . $row['course_id'] . "' class='btn btn-primary ' style='' >delete 1 section</button>";
        // }
        echo "</td>";
        echo "<td>";
            // if ($row['sum'] != 0) {
                echo "<button onclick='update_summer1(event," . $row['course_id'] . ")' id='btnadd" . $row['course_id'] . "' class='btn btn-success ' style='' >add 1 section</button>";
            // }
            echo "</td>";
                echo "</tr>";
            //     }
            // }
        }
        // foreach ($schedule as $entry) {
        //         if(str_starts_with($entry['Course ID'],$major)){
            // echo "</table>";
    
    
    
        //         }
            
    
        // }
    }
}


$conn->close();


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
                'pre_sub' => $course['pre_sub'],
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