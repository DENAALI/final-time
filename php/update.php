<?php
require '../connect.php';

if (isset($_POST['id1'])) {
    $id = $_POST['id1'];
    $section=[
        ['id' => 1, 'name' => 'section1','students_number'=>50 ],
['id' => 2, 'name' => 'section2','students_number'=>40 ],
        ['id' => 3, 'name' => 'section3', 'students_number'=>60],
        ['id' => 4, 'name' => 'section4','students_number'=>30 ],
        ['id' => 5, 'name' => 'section5','students_number'=>45 ],
        ['id' => 6, 'name' => 'section6','students_number'=>55 ],
    ];
    // Select the schedule record
    $scedual_select = "SELECT count(section) as 'count' FROM `schedule` WHERE subject_id = ?";
    $stmt = $conn->prepare($scedual_select);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $scedual_res = $stmt->get_result();
    $scedual_row = $scedual_res->fetch_assoc();
    if($scedual_row['count']>1){
        // echo $scedual_row['count'];
        $scedual_select = "SELECT * FROM `schedule` WHERE subject_id = ? order by section";
        $stmt = $conn->prepare($scedual_select);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $scedual_res = $stmt->get_result();
        // $scedual_row = $scedual_res->fetch_assoc();
        $sections = [];
        if($scedual_res->num_rows>0){

            while($row = $scedual_res->fetch_assoc()) {
                $sections[] = $row;
            }
        }
        
        $last_section = array_pop($sections);
        $students_to_distribute = $last_section['student_num'];

        // Distribute the students among the remaining sections
        $num_sections = count($sections);
        $extra_students = $students_to_distribute % $num_sections;
        $students_per_section = intdiv($students_to_distribute, $num_sections);

        foreach ($sections as $key => $section) {
            // print_r($key);
            $sections[$key]['student_num'] += $students_per_section;
            if ($extra_students > 0) {
                $sections[$key]['student_num'] += 1;
                $extra_students--;
            }
        }
        // print_r($sections);
        foreach ($sections as $section){

            $update="UPDATE `schedule` SET student_num=".$section['student_num']."  where id=".$section['id']."";
            $conn->query($update);
        }
        $delete="DELETE FROM `schedule` WHERE id=".$last_section['id']."";
        $conn->query($delete);
        // if ($scedual_row) {
        //     // Select the subject with the max section
        //     $subject_select = "SELECT *, MAX(section) as 'max' FROM `schedule` WHERE  subject_id = ?";
        //     $stmt = $conn->prepare($subject_select);
        //     $stmt->bind_param("i", $id);
        //     $stmt->execute();
        //     $subject_res = $stmt->get_result();

        //     if ($subject_res->num_rows > 0) {
        //         $subject_row = $subject_res->fetch_assoc();

        //         // Update student_num
        //         $update = "
        //             UPDATE `schedule` SET 
        //             `student_num` = (
        //                 (SELECT student_num FROM schedule WHERE subject_id = ? AND section = ?) + ?
        //             )
        //             WHERE subject_id = ? AND section = ?";
        //         $stmt = $conn->prepare($update);
        //         echo $subject_row['max'].$id;
        //         $prev_section = $subject_row['max'] - 1;
        //         $stmt->bind_param("ssiss", 
        //             $subject_row['subject_id'], 
        //             $prev_section, 
        //             $subject_row['student_num'], 
        //             $scedual_row['subject_id'], 
        //             $prev_section
        //         );
        //         // print_r($subject_row);
        //             if ($stmt->execute()) {
        //                 $delete="DELETE FROM `schedule` WHERE subject_id=$id and section=".$subject_row['max'];
        //                 // $conn->query($delete);
        //                 echo "done";
        //             } else {
        //                 echo "failed";
        //             }
        //     }
        // }   
            }else{
                $delete="DELETE FROM `schedule` WHERE subject_id=$id and section=1";
                $conn->query($delete);
                echo "done1";
            }
}
?>
