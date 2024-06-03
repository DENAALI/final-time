<?php
require '../../connect.php';

if (isset($_POST['id1'])) {
    $id = $_POST['id1'];

    // Select the schedule record
    $scedual_select = "SELECT count(section) as 'count' FROM `schedule` WHERE subject_id = ?";
    $stmt = $conn->prepare($scedual_select);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $scedual_res = $stmt->get_result();
    $scedual_row = $scedual_res->fetch_assoc();
    if($scedual_row['count']!=1){
        echo $scedual_row['count'];
    $scedual_select = "SELECT * FROM `schedule` WHERE subject_id = ?";
    $stmt = $conn->prepare($scedual_select);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $scedual_res = $stmt->get_result();
    $scedual_row = $scedual_res->fetch_assoc();
    
    if ($scedual_row) {
        // Select the subject with the max section
        $subject_select = "SELECT *, MAX(section) as 'max' FROM `schedule` WHERE section=(select MAX(section) FROM `schedule` where subject_id=$id)-1 and subject_id = ?";
        $stmt = $conn->prepare($subject_select);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $subject_res = $stmt->get_result();

        if ($subject_res->num_rows > 0) {
            $subject_row = $subject_res->fetch_assoc();

            // Update student_num
            $update = "
                UPDATE `schedule` SET 
                `student_num` = (
                    (SELECT student_num FROM schedule WHERE subject_id = ? AND section = ?) + ?
                )
                WHERE subject_id = ? AND section = ?";
            $stmt = $conn->prepare($update);
            $prev_section = $subject_row['max'] - 1;
            echo $subject_row['max'];
            $stmt->bind_param("ssiss", 
                $subject_row['subject_id'], 
                $prev_section, 
                $subject_row['student_num'], 
                $scedual_row['subject_id'], 
                $prev_section
            );
            // print_r($subject_row);
            if ($stmt->execute()) {
                $delete="DELETE FROM `schedule` WHERE subject_id=$id and section=".$subject_row['max'];
                $conn->query($delete);
                echo "done";
            } else {
                echo "failed";
            }
        }
    }
}
else{
    $delete="DELETE FROM `schedule` WHERE subject_id=$id and section=1";
    $conn->query($delete);
    echo "done1";
}
}
?>
