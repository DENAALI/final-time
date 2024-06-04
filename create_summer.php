
<?php
session_start();
if ($_SESSION['teacher_id'] ==null)
{
  header('Location:login.php');
}

?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
// include('connect.php');
?>
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <button class="btn btn-primary" data-toggle="modal" data-target="#hallModal" id="save_btn">save</button>
                </li>
             </ul>
    </nav>


</div>

</div>
<div class="row">

    <div class="card-body">

       
        <div class="table-responsive" >
            
            
            <form action="save_summer.php" id="summersave" method="post">
                <button id="savde" style="display: none;"   type="submit">Save</button>
                <table cellpadding="0" class="table table-bordered"  style="width: 100%;" cellspacing="0" border="1">


    <tr>
        <th>Course ID</th>
        <th>Course Name</th>
        <th>Section</th>
        <th>Student Number</th>
        <th>Days</th>
        <th>Time</th>
        <th>Room</th>
        <th>Teacher</th>
    </tr>
    <?php

require_once 'connect.php';
$time_ = [
    '08:00-09:15',
    '09:15-10:30',
    '10:30-11:45',
    '11:45-13:00',
    '13:00-14:15',
    '14:15-15:30',
    '15:30-16:45',
    '16:45-18:00',
];
$major = '';
$semester = '';
// $select_time="SELECT  time FROM `summer` WHERE course_name not like '%lab%' or course_name not like '%Lab%' GROUP BY time";
if (isset($_POST['major1'])) {
    $major_id = $_POST['major1'];
    $semester = $_POST['semester2'];
?>
<td style="display: none;" >
    <input type="hidden" id="major2" value="<?php echo $major_id ?>" name="major2">
</td>
<td style="display: none;" >
    <input type="hidden" id="semester2" value="<?php echo $semester ?>" name="semester2">
</td>
<?php
    if ($major_id == 1) {
        $major = '221';
    } elseif ($major_id == 2) {
        $major = '223';
    } elseif ($major_id == 3) {
        $major = '222';
    }

    // Fetch teachers data
    $teachers = [];
    $sqlTeachers = "SELECT id, name FROM teacher WHERE type != 'admin' AND (depar_num=$major_id)";
    $teacher_result = $conn->query($sqlTeachers);
   
    while ($teacher_row = $teacher_result->fetch_assoc()) {
        $teachers[$teacher_row['id']] = [
            'name' => $teacher_row['name'],
            'subjects' => 0,
            'classes' => [],
            'time1' => [],
            'time2' => [],

        ];
    }
    $sql = "SELECT * FROM summer WHERE course_id LIKE '$major%' ";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $assigned_teacher = '';
        $isLab = (strpos($row['course_name'], 'lab') !== false) || (strpos($row['course_name'], 'Lab') !== false);
       ?>
       <script>
        // console.log('<?php echo $isLab ?>');
       </script>
       <?php
       if(!$isLab)
        foreach ($teachers as $teacher_id => $teacher) {
            $max_subjects = getMaxSubjects($teacher['name']);
            if ($teacher['subjects'] <= $max_subjects) {
                if ($isLab && (strpos($teacher['name'], 'Mr') === false && strpos($teacher['name'], 'Mrs') === false)) {
                    continue; // المواد العملية يمكن أن تُدرس فقط من قبل Mr أو Mrs
                }
                $can_assign = canAssignTeacher($teacher, $row['day'], $row['time'], $isLab,$time_);
                if ($can_assign && $row['teacher'] == '' && subcount($conn, $teacher['name'])&&section_num($conn,$teacher['name'],$row['course_name'],$teacher,$teachers[$teacher_id]['subjects'])) {
                    $teachers[$teacher_id]['subjects'] += 1;
                    $teachers[$teacher_id]['classes'][] = ['sub_name'=>$row['course_name'],'day' => $row['day'], 'time' => $row['time'], 'isLab' => $isLab];
                    $assigned_teacher = $teacher['name'];
                    break;
                }
            }
        }

        echo "<tr>
        <td>{$row['course_id']}</td>
        <td>{$row['course_name']}</td>
        <td>{$row['section']}</td>
        <td>{$row['students']}</td>
        <td>{$row['day']}</td>
        <td>{$row['time']}</td>
        <td>{$row['room']}</td>";
echo "<td><select class='form-control bg-light border-0 small' name='teachers[" . $row['course_id'] . "][" . $row['section'] . "]'>";
echo "<option selected value='non'>non</option>";
if ($row['teacher']!=null) {
    $tec=$row['teacher'];
echo "<option selected value='$tec'>$tec</option>";
}else{
if($assigned_teacher===''){
   
}else
    echo "<option value'$assigned_teacher' selected>$assigned_teacher</option>";

}
$sqlTeachers = "SELECT id, name FROM teacher WHERE type != 'admin'";
$teacher_result = $conn->query($sqlTeachers);
while ($teacher_row = $teacher_result->fetch_assoc()) {
    echo "<option value'{$teacher_row['name']}' >{$teacher_row['name']}</option>";
}

echo"</select></td>";
// echo"<td>$assigned_teacher</td>";
    
        echo"</tr>";
        // echo'<pre>';
        // print_r($teachers);
        // echo'</pre>';
    }
}

// تحديد عدد المواد المسموح به بناءً على نوع المدرس
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

// تحويل الأوقات النصية إلى أرقام
function timeToNumber($time) {
    $parts = explode('-', $time);
    $start = intval(str_replace(':', '', $parts[0]));
    $end = intval(str_replace(':', '', $parts[1]));
    return ['start' => $start, 'end' => $end];
}

// التحقق من الشروط الإضافية لتوزيع المدرسين
function canAssignTeacher($teacher, $day, $time, $isLab,$all_times) {
    $current_time = timeToNumber($time);
    $lecture_duration = $isLab ? 90 : 75; // مدة المحاضرات بالدقائق
    $index=0;
    $consecutive_count = 1;
    foreach ($teacher['classes'] as $class_time) {
        // echo $class_time['time'];
        $class_time_numeric = timeToNumber($class_time['time']);

        if ($class_time['day'] == $day) {
            if ($class_time_numeric['start'] <= $current_time['start'] && $class_time_numeric['end'] > $current_time['start']) {
                return false; // تضارب في الأوقات
            }
            if ($class_time_numeric['end'] == $current_time['start'] || ($class_time_numeric['end'] + $lecture_duration) == $current_time['start']) {
                $consecutive_count++;
            } else {
                $consecutive_count = 0;
            }
            if ($consecutive_count >= 2) {
                return false; // أكثر من محاضرتين متتاليتين
            }
        }
    }
    return true;
}

function section_num($conn,$techer_name,$corse_name,$teacher,$sub_count){
    $sqlTeacherClasses = "SELECT * FROM summer WHERE teacher='$techer_name' ";
    $result = $conn->query($sqlTeacherClasses);
   $sections = $result->fetch_assoc();
   $max=getMaxSubjects($techer_name);
   if($sections!=null ){
    if($result->num_rows>=$max){
        return false;
    }
    }
    if($sub_count>=$max){
        return false;
    }
    $section_number=0;
   foreach ($teacher['classes'] as $class_time) {
        if($class_time['sub_name']==$corse_name){
            $section_number+=1;
        }
   }
   if( $section_number>=2){
    return false;
   }else{
   
   }
   return true;
}
// التحقق من توفر الغرف
function is_room_available($schedule, $room_name, $days, $time_slot) {
    foreach ($schedule as $entry) {
        if ($entry['Room'] == $room_name && $entry['Days'] == $days && $entry['Time'] == $time_slot['start'] . '-' . $time_slot['end']) {
            return false;
        }
    }
    return true;
}

// التحقق من عدد المواد المدرسية
function subcount($conn, $teacher) {
    $sqlTeacherClasses = "SELECT * FROM summer WHERE teacher='$teacher' ";
    $result = $conn->query($sqlTeacherClasses);

    $subject_count = 0;
    $subject_sections = [];
    while ($row = $result->fetch_assoc()) {
        $subject_count++;
        if (!isset($subject_sections[$row['course_id']])) {
            $subject_sections[$row['course_id']] = 0;
        }
        $subject_sections[$row['course_id']]++;
    }

    $max_subjects = getMaxSubjects($teacher);

    if ($subject_count >= $max_subjects) {
        return false;
    }
    return true;
}

?>
</form>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#save_btn').click(function(){
$('#summersave').submit();

});
$(document).ready(function() {
    var previousValue = null;

    $('select[name^="teachers"]').focus(function() {
        // تخزين القيمة الحالية عند التركيز على القائمة المنسدلة
        previousValue = $(this).val();
    }).change(function() {
        var teacher = $(this).val();
        var course_id = $(this).closest('tr').find('td:first').text();
        var section = day = $(this).closest('tr').find('td').eq(2).text();
        var day = $(this).closest('tr').find('td').eq(4).text();
        var time = $(this).closest('tr').find('td').eq(5).text();
        var major_id = $('#major2').val();
        var semester = $('#semester2').val();
        console.log();
        $.ajax({
            url: 'php/check_summer.php',
            type: 'POST',
            data: {
                teacher: teacher,
                course_id: course_id,
                section: section,
                day: day,
                time: time,
                major_id: major_id,
                semester: semester
            },
            success: function(response) {
                if (response != 'ok') {
                    alert(response);
                    $(this).val(previousValue);  // إعادة تعيين القيمة إلى القيمة السابقة في حالة وجود تضارب
                }
                console.log(response);
            }.bind(this)
        });
    });
});


</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

