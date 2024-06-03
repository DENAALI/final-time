<?php
// اتصال بقاعدة البيانات
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "timetable";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// التأكد من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استيراد البيانات المستوردة من ملف Excel
if (isset($_POST['importedData'])) {
    $importedData = $_POST['importedData'];
    $i=1;
    $selectal="select * from statistics";
    $result=$conn->query($selectal);
    if($result->num_rows == 0) {

  
    foreach ($importedData as $data) {
        // تحضير الاستعلام لإدراج البيانات في جدول البيانات
        if($i!=1){
            $course_type="";
                if( str_contains( $data[1],"Lab")||str_contains( $data[1],"lab"))
                    $course_type="laboratory";
                else
                $course_type="theoretical";
            $sql = "INSERT INTO statistics ( `subject_name`, `subject_num`,subject_type,  `num_of_study` ) 
                VALUES ('" . $data[1] . "', '" . $data[0] . "','$course_type', " . $data[2]+$data[3] . ")";

            if ($conn->query($sql) !== TRUE) {
                echo "حدث خطأ أثناء تخزين البيانات: " . $conn->error;
            }
            }
        $i++;
    }
}
    echo "تم حفظ البيانات بنجاح!";
}

$conn->close();
?>
