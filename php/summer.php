
    <?php
$major='';
require_once '../connect.php';
if (isset($_POST['major1'])) {
    $major_id = $_POST['major1'];
    $semester = $_POST['semester1'];

    if ($_POST['major1'] == 1) {
        $major = '221';
    } elseif ($_POST['major1'] == 2) {
        $major = '223';
    } elseif ($_POST['major1'] == 3) {
        $major = '222';
    }

    // Fetch courses data


    $sql = "SELECT * FROM statistics ";
    $result = $conn->query($sql);
    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $course = [
            'id' => $row['subject_num'],
            'name' => $row['subject_name'],
            'students' => $row['num_of_study'],
            'capacity' => 50,
            'is_lab' => (strpos(strtolower($row['subject_name']), 'lab') !== false || strpos(strtolower($row['subject_name']), 'Lab') !== false)
        ];
        array_push($courses, $course);
    }

    $sql = "SELECT * FROM hall";
    $result = $conn->query($sql);
    $roomsLabs = [];
    while ($row = $result->fetch_assoc()) {
        $room = [
            'name' => $row['hall_name'],
            'type' => $row['type_name'] == 'theoretical' ? 'normal' : 'lab',
        ];
        array_push($roomsLabs, $room);
    }

    $days_theory = 'Sunday-Monday-Tuesday-Wednesday';
    $days_lab = 'Monday-Wednesday';
    $time_slots_theory = [
        ['start' => '08:00', 'end' => '09:15'],
        ['start' => '09:15', 'end' => '10:30'],
        ['start' => '10:30', 'end' => '11:45'],
        ['start' => '11:45', 'end' => '13:00'],
        ['start' => '13:00', 'end' => '14:15'],
        ['start' => '14:15', 'end' => '15:30'],
        ['start' => '15:30', 'end' => '16:45'],
        ['start' => '16:45', 'end' => '18:00'],
    ];
    $time_slots_lab = [
        ['start' => '08:00', 'end' => '09:30'],
        ['start' => '09:30', 'end' => '11:00'],
        ['start' => '11:00', 'end' => '12:30'],
        ['start' => '12:30', 'end' => '14:00'],
        ['start' => '14:00', 'end' => '15:30'],
        ['start' => '15:30', 'end' => '17:00'],
    ];
    $schedule = [];

    foreach ($courses as $course) {
        $num_groups = ceil($course['students'] / $course['capacity']);

        $students_per_group = array_fill(0, $num_groups, intdiv($course['students'], $num_groups));
        for ($i = 0; $i < $course['students'] % $num_groups; $i++) {
            $students_per_group[$i]++;
        }

        // echo $num_groups;
        $group_count = 0;
        $slot_index = 0;
        if ($course['is_lab']) {

            while ($group_count < $num_groups && $slot_index < count($time_slots_lab)) {
                $time_slot = $time_slots_lab[$slot_index];
                foreach ($roomsLabs as $room) {
                    if ($room['type'] == 'lab' && is_room_available($schedule, $room['name'], $days_lab, $time_slot)) {
                        
                        $i=0;
                        foreach ($schedule as $entry) {
                            if($time_slot['start'] . '-' . $time_slot['end']==$entry['Time']){
                                $i++;
                            }
                        }
                        if($i>=3)
                        continue;
                    $schedule[] = [
                        'Course ID' => $course['id'],
                        'Course Name' => $course['name'],
                        'Section' => '' . ($group_count + 1),
                        'Time' => $time_slot['start'] . '-' . $time_slot['end'],
                        'Days' => $days_lab,
                        'students_per_group' => $students_per_group[$group_count],
                        'Room' => $room['name']
                    ];
                    $group_count++;
                    break; // Move to next group
                    }
                }
                $slot_index++;
            }
        } else {
            // Assign theory sessions
            while ($group_count < $num_groups && $slot_index < count($time_slots_theory)) {
                $time_slot = $time_slots_theory[$slot_index];
                foreach ($roomsLabs as $room) {
                    if ($room['type'] == 'normal' && is_room_available($schedule, $room['name'], $days_theory, $time_slot)) {
                        $i=0;
                        foreach ($schedule as $entry) {
                            if($time_slot['start'] . '-' . $time_slot['end']==$entry['Time']){
                                $i++;
                            }
                        }
                        if($i>=7){
                            
                            continue;
                        }
                        $schedule[] = [
                            'Course ID' => $course['id'],
                            'Course Name' => $course['name'],
                            'Section' => ' ' . ($group_count + 1),
                            'Time' => $time_slot['start'] . '-' . $time_slot['end'],
                            'Days' => $days_theory,
                            'students_per_group' => $students_per_group[$group_count],
                            'Room' => $room['name']
                        ];
                        $group_count++;
                        break; // Move to next group
                    }
                }
                $slot_index++;
            }
        }
    }
    // echo '<pre>';
    // print_r($schedule);
    // echo '</pre>';

    // Display the schedule in a table
    $i=1;
    $sql = "SELECT * FROM summer";
    $result = $conn->query($sql);
    if($result->num_rows==0){
        foreach ($schedule as $entry) {
            $Course_id =$entry['Course ID'];
            $Course_name =$entry['Course Name'];
            $Section=$entry['Section'];
            $Time   =$entry['Time'];
            $Days   =$entry['Days'];
            $Room   =$entry['Room'];
            $students  =$entry['students_per_group'];
        $insert="INSERT INTO `summer`( `course_id`, `course_name`, `section`, `time`, `day`, `room`,students) VALUES 
        ('$Course_id','$Course_name','$Section','$Time ','$Days','$Room',$students)";
        //    echo 1231;
            if($conn->query($insert)){
               
            }
        }
    }else{
        $sql = "SELECT * ,count(section) as 'count' FROM summer where course_id like '$major%' group by course_id";
        $result = $conn->query($sql);
        print_r($result);
        while ($row = $result->fetch_assoc()) {
            $sql1 = "SELECT * FROM statistics";
            $result1 = $conn->query($sql1);
            while ($row1= $result1->fetch_assoc()){
                if($row1['subject_num']==$row['course_id']){

                echo "<tr>
                <td>{$row['course_id']}</td>
                <td>{$row['course_name']}</td>
                <td>{$row['count']}</td>
                <td>{$row1['num_of_study']}</td>
                <td>edit</td>
                </tr>";

                }
            }
        }
        // foreach ($schedule as $entry) {
        //         if(str_starts_with($entry['Course ID'],$major)){




        //         }
            
     
        // }
    }
}


function is_room_available($schedule, $room_name, $days, $time_slot) {
    foreach ($schedule as $entry) {
        if ($entry['Room'] == $room_name && $entry['Days'] == $days && $entry['Time'] == $time_slot['start'] . '-' . $time_slot['end']) {
            return false;
        }
    }
    return true;
}
?>


