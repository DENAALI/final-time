<?php
require '../connect.php';

if (isset($_POST['id1'])) {
    $id = $_POST['id1'];
    if(!isset($_POST['add'])){
    // Select the schedule record
    $scedual_select = "SELECT count(section) as 'count' FROM `summer` WHERE course_id = ?";
    $stmt = $conn->prepare($scedual_select);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $scedual_res = $stmt->get_result();
    $scedual_row = $scedual_res->fetch_assoc();
    if($scedual_row['count']>1){
        // echo $scedual_row['count'];
        $scedual_select = "SELECT * FROM `summer` WHERE course_id = ? order by section";
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
        $students_to_distribute = $last_section['students'];

        // Distribute the students among the remaining sections
        $num_sections = count($sections);
        $extra_students = $students_to_distribute % $num_sections;
        $students_per_section = intdiv($students_to_distribute, $num_sections);

        foreach ($sections as $key => $section) {
            // print_r($key);
            $sections[$key]['students'] += $students_per_section;
            if ($extra_students > 0) {
                $sections[$key]['students'] += 1;
                $extra_students--;
            }
        }
        // print_r($sections);
        foreach ($sections as $section){

            $update="UPDATE `summer` SET students=".$section['students']."  where id=".$section['id']."";
            $conn->query($update);
        }
        $delete="DELETE FROM `summer` WHERE id=".$last_section['id']."";
        $conn->query($delete);
         
            }else{
                $delete="DELETE FROM `summer` WHERE course_id=$id and section=1";
                $conn->query($delete);
                echo "done1";
            }
        }else{
            $id = $_POST['id1'];
            // Select the schedule record
            $scedual_select = "SELECT count(section) as 'count', SUM(students) as 'total_students' FROM `summer` WHERE course_id = ?";
            $stmt = $conn->prepare($scedual_select);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $scedual_res = $stmt->get_result();
            $scedual_row = $scedual_res->fetch_assoc();
            
            if ($scedual_row['count'] > 0) {
                $total_students = $scedual_row['total_students'];
            
                // Get all sections
                $scedual_select = "SELECT * FROM `summer` WHERE course_id = ? ORDER BY section";
                $stmt = $conn->prepare($scedual_select);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $scedual_res = $stmt->get_result();
                $sections = [];
                if ($scedual_res->num_rows > 0) {
                    while ($row = $scedual_res->fetch_assoc()) {
                        $sections[] = $row;
                    }
                }
            
                // Create the new section
                $new_section_number = count($sections) + 1;
                $new_section_students = 0; // Initialize the count of students for the new section
                $insert_new_section = "INSERT INTO `summer` (course_id, section, students, course_name, day) VALUES (?, ?, ?, ?, ?)";
                // $stmt = $conn->prepare($insert_new_section);
                // $stmt->bind_param("siiss", $id, $new_section_number, $new_section_students, $sections[0]['course_name'], $sections[0]['day']);
                // $stmt->execute();
                $new_section_id = $conn->insert_id; // Get the ID of the new section
            
                // Recalculate total sections including the new one
                $total_sections = count($sections) + 1;
                $students_per_section = floor($total_students / $total_sections);
                $remaining_students = $total_students % $total_sections;
            
                // Update each section including the new one
                foreach ($sections as $key => $section) {
                    $sections[$key]['students'] = $students_per_section;
                    $update = "UPDATE `summer` SET students = ? WHERE id = ?";
                    // $stmt = $conn->prepare($update);
                    // $stmt->bind_param("ii", $sections[$key]['students'], $sections[$key]['id']);
                    // $stmt->execute();
                }
            
                // Update the new section
                $new_section_students = $students_per_section + $remaining_students; // Assign remaining students to the new section
                $update_new_section = "UPDATE `summer` SET students = ? WHERE id = ?";
                $stmt = $conn->prepare($update_new_section);
                // $stmt->bind_param("ii", $new_section_students, $new_section_id);
                // $stmt->execute();
            


        
                // Distribute the students among the existing sections
                // $remaining_students_to_transfer = $students_to_transfer;
                // foreach ($sections as $key => $section) {
                //     if ($remaining_students_to_transfer <= 0) break;
        
                //     $students_from_section = min($section['students'], $remaining_students_to_transfer);
                //     $sections[$key]['students'] -= $students_from_section;
                //     $remaining_students_to_transfer -= $students_from_section;
                // }
        
                // // Update the existing sections with the new student numbers
                // foreach ($sections as $section) {
                //     $update = "UPDATE `summer` SET students = ? WHERE id = ?";
                //     $stmt = $conn->prepare($update);
                //     $stmt->bind_param("ii", $section['students'], $section['id']);
                //     $stmt->execute();
                // }
                $time_1 = [

                 '10:30-11:45',
                 '11:45-13:00',
                 '13:00-14:15',
                 '14:15-15:30',
                 
                 '08:00-09:15',
                 '09:15-10:30',
                 ];
                 
                 $time_2 = [
                 //    '08:00-09:30',
                 
                 '12:30-14:00',
                 '14:00-15:30',
                 
                 '09:30-11:00',
                 '11:00-12:30',
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
                $scedual_select = "SELECT * FROM `summer` WHERE course_id = $id and time='' ";
                $result=$conn->query($scedual_select);
               
                $row = $result->fetch_assoc();
                if(str_contains($row['course_name'],'lab')||str_contains($row['course_name'],'Lab')||str_contains($row['course_name'],'LAB')){
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

                    $scedual_select1 = "SELECT * FROM `summer` WHERE course_id like '$sub%' ";
                    $result1=$conn->query($scedual_select1);
                    

                    while ($row1=$result1->fetch_assoc())
                    {

                        if($row1['time']==$time&&$row &&$hall['hall_name']==$row1['room']){
                            
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
    
                        $scedual_select1 = "SELECT * FROM `summer` WHERE course_id like '$sub%' ";
                        $result1=$conn->query($scedual_select1);
                        
    
                        while ($row1=$result1->fetch_assoc())
                        {
    
                            if($row1['time']==$time&&$hall['hall_name']==$row1['hall']&&$row['day']==$row1['day']){
                                
                            }else{
                                $update = "UPDATE `summer` SET time = ?,room=? WHERE id = ?";
                        // $stmt = $conn->prepare($update);
                        // $stmt->bind_param("ssi", $time,$hall['hall_name'], $row['id']);
                        // $stmt->execute();
                            }
                        }
                    }
                }
               

        
            } else {
                
            }
        }
}
?>
