<?php
// require "../../connect.php";


$major_id = 0;
$schedual = [];
$major = '';
if (isset($_POST['major5'])) {
    $major_id = $_POST['major5'];
    // $level = $_POST['level1'];
    $semester = $_POST['semester5'];


?>
<td style="display: none;" >
    <input type="hidden" id="major2" value="<?php echo $major_id ?>" name="major2">
</td>
<td style="display: none;" >
    <input type="hidden" id="semester2" value="<?php echo $semester ?>" name="semester2">
</td>
<?php
    if ($_POST['major5'] == 1) {
        $major = '221';
    } elseif ($_POST['major5'] == 2) {
        $major = '223';
    } elseif ($_POST['major5'] == 3) {
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
    $sql12 = "SELECT `course id`, `course name` FROM tims GROUP BY `course name`";
    $sql = "SELECT * FROM statistics";
    $result1 = $conn->query($sql12);
    $courses = [];
    $conflect = "";
    $scedual_select = "SELECT * FROM `schedule` where subject_id like '$major%'";
    $scedual_res = $conn->query($scedual_select);
    
    // جلب بيانات المدرسين
    $teachers = [];
    $teacher_schedule = [];
    $sqlTeachers = "SELECT id, name FROM teacher WHERE type != 'admin' AND (depar_num=$major_id)";
    $teacher_result = $conn->query($sqlTeachers);
   
    while ($teacher_row = $teacher_result->fetch_assoc()) {
        $teachers[$teacher_row['id']] = [
            'name' => $teacher_row['name'],
            'subjects' => 0,
            'classes' => []
        ];
    }

    // تخصيص عدد المواد بناءً على نوع المدرس
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
        $parts = explode('_', $time);
        return intval($parts[0]);
    }

    // التحقق من الشروط الإضافية لتوزيع المدرسين
    function canAssignTeacher($teacher, $day, $time, $isLab) {
        global $teachers;

        $current_time = timeToNumber($time);
        foreach ($teacher['classes'] as $class_time) {
            $class_time_numeric = timeToNumber($class_time['time']);
            if ($class_time['day'] == $day) {
                // التحقق من الشروط الخاصة بالفترات المتتالية والتضارب
                if (abs($class_time_numeric - $current_time) < 2) {
                    return false; // المدرس لديه محاضرتين متتاليتين أو تضارب في الأوقات
                }
            }
        }
        return true;
    }
// $i=1;
    while ($row = $scedual_res->fetch_assoc()) {
        $student_count = 0;
        $result = $conn->query($sql);
        while ($stat_res = $result->fetch_assoc()) {
            if ($stat_res['subject_num'] == $row['subject_id']) {
                $student_count = $stat_res['num_of_study'];
            }
        }

        $selectsub = "SELECT * FROM `subjects` WHERE semester=$semester AND subject_id = ".$row['subject_id']." and subject_id like '$major%' ";
        $sub_result = $conn->query($selectsub);
        $test=$sub_result->fetch_assoc();
        if (mysqli_num_rows($sub_result) > 0) {
            if($test['subject_id']=='2212351')
            {
            ?>
            <script>
                console.log("<?php echo $test['semester'] ?>");
            </script>
            <?php
            }
            // البحث عن مدرس مناسب
            $assigned_teacher = '';
            $isLab = (strpos($row['subject_name'], 'lab') !== false)||(strpos($row['subject_name'], 'Lab') !== false);
            foreach ($teachers as $teacher_id => $teacher) {
                $max_subjects = getMaxSubjects($teacher['name']);
                if ($teacher['subjects'] < $max_subjects) {
                    if ($isLab && (strpos($teacher['name'], 'Mr') === false && strpos($teacher['name'], 'Mrs') === false)) {
                        continue; // المواد العملية يمكن أن تُدرس فقط من قبل Mr أو Mrs
                    }
                    $can_assign = canAssignTeacher($teacher, $row['day'], $row['time'], $isLab);
                    if ($can_assign&&$row['techer']==''&&subcount($conn,$teacher['name'])) {
                        $teachers[$teacher_id]['subjects'] += 1;
                        $teachers[$teacher_id]['classes'][] = ['day' => $row['day'], 'time' => $row['time']];
                        $assigned_teacher = $teacher['name'];
                        break;
                    }
                }
            }
            
            echo "<tr>";    
            // echo "<td>" . $i. "</td>";
            echo "<td>" . $row['subject_id'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "<td>" . $row['section'] . "</td>";
            echo "<td>" . $row['student_num'] . "</td>";
            echo "<td>" . $row['day'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['hall'] . "</td>";
            echo "<td><select class='form-control bg-light border-0 small' name='teachers[" . $row['subject_id'] . "][" . $row['section'] . "]'>";
            echo "<option selected value='non'>non</option>";
            $selectAlltecher="SELECT id, name FROM teacher WHERE type != 'admin' ";
            if($row['techer']==""){
                
                foreach ($teachers as $teacher_id => $teacher) {
                // while ($teacher=$techers_result->fetch_assoc()) {
                    if ($teacher['name']== $assigned_teacher) {
                        echo "<option selected value='" . $teacher['name'] . "'>" . $teacher['name'] . "</option>";
                    } else {
                        // echo "<option value='" . $teacher['name'] . "'>" . $teacher['name'] . "</option>";
                    }

                }
                
                $techers_result = mysqli_query($conn,$selectAlltecher);
                $Altechers= $techers_result->fetch_array();
                while ($teacher=$techers_result->fetch_assoc()) {
                    if($teacher['name'] != $row['techer']){
                        echo "<option value='" . $teacher['name'] . "'>" . $teacher['name'] . "</option>";
                    }
                }
            }else{
                // echo "<option selected value='".$row['techer']."'>".$row['techer']."</option>";

                foreach ($teachers as $teacher_id => $teacher) {
                    if ($teacher['name'] == $row['techer']) {
                        echo "<option selected value='" . $teacher['name'] . "'>" . $teacher['name'] . "</option>";
                    } else {
                        // echo "<option value='" . $teacher['name'] . "'>" . $teacher['name'] . "</option>";
                    }
                }
                
                $techers_result = mysqli_query($conn,$selectAlltecher);
                $Altechers= $techers_result->fetch_array();
                while ($teacher=$techers_result->fetch_assoc()) {
                    if($teacher['name'] != $row['techer']){
                        echo "<option value='" . $teacher['name'] . "'>" . $teacher['name'] . "</option>";
                    }
                }
            }
            // $i++;
            echo "</select></td>";
            echo "</tr>";
        }
    }

    $major_id = $_POST['major5'] = null;
    $level = $_POST['level1'] = null;
    $semester = $_POST['semester5'] = null;
}


function subcount($conn,$teacher){
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
    return false;
    // echo "هذا الأستاذ لا يمكنه تدريس أكثر من $max_subjects مواد.";
    // exit;
}else return true;


}

// $conn->close();
?>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
$(document).ready(function() {
    var previousValue = null;

    $('select[name^="teachers"]').focus(function() {
        // تخزين القيمة الحالية عند التركيز على القائمة المنسدلة
        previousValue = $(this).val();
    }).change(function() {
        var teacher = $(this).val();
        var subject_id = $(this).closest('tr').find('td:first').text();
        var section = day = $(this).closest('tr').find('td').eq(2).text();
        var day = $(this).closest('tr').find('td').eq(4).text();
        var time = $(this).closest('tr').find('td').eq(5).text();
        var major_id = $('#major2').val();
        var semester = $('#semester2').val();
        
        $.ajax({
            url: 'php/check_schedule.php',
            type: 'POST',
            data: {
                teacher: teacher,
                subject_id: subject_id,
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
