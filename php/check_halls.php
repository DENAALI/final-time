<?php
require "../connect.php";



$teacher = $_POST['teacher'];
$subject_id = $_POST['subject_id'];
$section = $_POST['section'];
$day = $_POST['day'];
$time = $_POST['time'];
$major_id = $_POST['major_id'];
$semester = $_POST['semester'];
$hall = $_POST['hall'];
// echo $hall;
$days='';
$arr="";
if(str_contains($day,'-'))
{
    $days=explode('-', $day);
    // print_r($days);
    if(count($days)==3){

        $arr="('".$days[0]."','".$days[1]."','".$days[2]."','".$day."')";
    }else{
        $arr="('".$days[0]."','".$days[1]."','".$day."')";
    }

}else{
    $arr="('".$day."')";

}
$start_time=timeToNumber($time);
// echo $start_time;
// $select='SELECT `id`, `subject_id`, `subject_name`, `section`, `techer`, `time`, `day`, `hall`, `student_num` FROM `schedule` WHERE 1';
$select="select * from schedule where time like '$start_time%' and hall='$hall' and day in $arr  ";
// echo $select;

$result=$conn->query($select);
if($result->num_rows>0){
    echo "هذه القاعة محجوزة في هذا الوقت واليوم";
}

function timeToNumber($time) {
    if(str_contains($time,':')){
        
        $parts = explode('_', $time);
        $start='';
        if(str_contains($parts[0],':')){
            $start = explode(':', $parts[0]);
        }else $start=$parts[0];
    // echo intval($parts[0]) ;
    return intval($start);
    }else{
        $parts = explode('_', $time);
        return intval($parts[0]);
    }
}
echo 'ok';
?>