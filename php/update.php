<?php
require '../connect.php';

if (isset($_POST['id1'])) {
    $id = $_POST['id1'];
    if(!isset($_POST['add'])){
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
         
            }else{
                $delete="DELETE FROM `schedule` WHERE subject_id=$id and section=1";
                $conn->query($delete);
                echo "done1";
            }
        }else{
            $id = $_POST['id1'];
    
            // Select the schedule record
            $scedual_select = "SELECT count(section) as 'count' FROM `schedule` WHERE subject_id = ?";
            $stmt = $conn->prepare($scedual_select);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $scedual_res = $stmt->get_result();
            $scedual_row = $scedual_res->fetch_assoc();
            if($scedual_row['count']>0){
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
                
                // Determine the number of students to transfer to the new section
                $total_students = 0;
                foreach ($sections as $section) {
                    $total_students += $section['student_num'];
                }
        
                $students_to_transfer = intval($total_students * 0.1); // Transfer 10% of the total students to the new section
        
                // Create the new section
                $new_section_number = count($sections) + 1;
                $new_section_students = $students_to_transfer;
                $insert_new_section = "INSERT INTO `schedule` (subject_id, section, student_num,subject_name,day) VALUES (?, ?, ?,?,?)";
                $stmt = $conn->prepare($insert_new_section);
                $stmt->bind_param("siiss", $id, $new_section_number, $new_section_students,$sections[0]['subject_name'],$sections[0]['day']);
                $stmt->execute();
        
                // Distribute the students among the existing sections
                $remaining_students_to_transfer = $students_to_transfer;
                foreach ($sections as $key => $section) {
                    if ($remaining_students_to_transfer <= 0) break;
        
                    $students_from_section = min($section['student_num'], $remaining_students_to_transfer);
                    $sections[$key]['student_num'] -= $students_from_section;
                    $remaining_students_to_transfer -= $students_from_section;
                }
        
                // Update the existing sections with the new student numbers
                foreach ($sections as $section) {
                    $update = "UPDATE `schedule` SET student_num = ? WHERE id = ?";
                    $stmt = $conn->prepare($update);
                    $stmt->bind_param("ii", $section['student_num'], $section['id']);
                    $stmt->execute();
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
                $sub=substr($id,0,3);
                $scedual_select = "SELECT * FROM `schedule` WHERE subject_id = $id and time='' ";
                $result=$conn->query($scedual_select);
               
                $row = $result->fetch_assoc();
                if(str_contains($row['subject_name'],'lab')||str_contains($row['subject_name'],'Lab')||str_contains($row['subject_name'],'LAB')){
                   foreach($halls['laboratory']as  $hall){

                    $lasttime=$sections[count($sections)-1]['time'];
                    $index = array_search($lasttime, $time_2);
                    $time='';
                    if(isset($time_2[$index+1]))
                    {
                        $time=$time_2[$index+1];
                    }else{
                        $time=$time_2[0];
                    }

                    $scedual_select1 = "SELECT * FROM `schedule` WHERE subject_id like '$sub%' ";
                    $result1=$conn->query($scedual_select1);
                    

                    while ($row1=$result1->fetch_assoc())
                    {

                        if($row1['time']==$time&&$row &&$hall['hall_name']==$row1['hall']){
                            
                        }
                    }
                }
                }else{
                    foreach($halls['laboratory']as  $hall){

                        $lasttime=$sections[count($sections)-1]['time'];
                        $index = array_search($lasttime, $time_1);
                        $time='';
                        if(isset($time_1[$index+1]))
                        {
                            $time=$time_1[$index+1];
                        }else{
                            $time=$time_1[0];
                        }
    
                        $scedual_select1 = "SELECT * FROM `schedule` WHERE subject_id like '$sub%' ";
                        $result1=$conn->query($scedual_select1);
                        
    
                        while ($row1=$result1->fetch_assoc())
                        {
    
                            if($row1['time']==$time&&$hall['hall_name']==$row1['hall']&&$row['day']==$row1['day']){
                                
                            }else{
                                $update = "UPDATE `schedule` SET time = ?,hall=? WHERE id = ?";
                        $stmt = $conn->prepare($update);
                        $stmt->bind_param("ssi", $time,$hall['hall_name'], $row['id']);
                        $stmt->execute();
                            }
                        }
                    }
                }
               

        
            } else {
                
            }
        }
}
?>
