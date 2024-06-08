

    <!-- Your existing HTML and PHP code -->
    
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
    <?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "timetable";
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$mm='';
if($_POST['major2']==1){

    $mm=221;
}
if($_POST['major2']==2){

    $mm=223;
}
if($_POST['major2']==3){
    $mm=222;
}

$scedual_select = "SELECT * FROM schedule where subject_id like '$mm%' order by techer ";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $scedual_res = $conn->query($scedual_select);
    // echo '<pre>';
    // print_r($_POST['teachers']);
    // echo '</pre>';
    while ($row = $scedual_res->fetch_assoc()) {
        $fieldName = "" . $row['subject_id'] . $row['section'] . "";

        if (isset($_POST['teachers'][$row['subject_id']][$row['section']])) {
            $teacher = $_POST['teachers'][$row['subject_id']][$row['section']];
            $hall = $_POST['halls'][$row['subject_id']][$row['section']];
            $hour = $_POST['hours'][$row['subject_id']][$row['section']];
            // if ($teacher != '') {
                // if (isset($_POST['hours'][$row['subject_id']][$row['section']])) {}
                // if (isset($_POST['halls'][$row['subject_id']][$row['section']])) {

                // }

                $update = "UPDATE `schedule` SET `techer`='$teacher', time='$hour', hall='$hall'  WHERE subject_id=" . $row['subject_id'] . " AND section=" . $row['section'];
                $result = $conn->query($update);
                if ($result === false) {
                    die("فشل في تنفيذ الاستعلام: " . $conn->error);
                } else {
                    // echo "success";
                }
            // }
        }
    }
    // echo "تم تحديث البيانات بنجاح";
} else {
    echo "لم يتم استلام أي بيانات";
}

// عرض البيانات بعد التحديث
$scedual_res = $conn->query($scedual_select);
?>
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


    <form action="createtable.php" id="backfrm" method="POST" >
    <input type="hidden" id="xlsx" value="<?php 
        if($_POST['major2']==1)
        echo 'CS__schedule.xlsx';
        elseif($_POST['major2']==2)
        echo 'SE__schedule.xlsx';
        elseif($_POST['major2']==3)
        echo 'DS__schedule.xlsx';
        ?>" name="xlsx">
        <input type="hidden" id="major1" value="<?php echo $_POST['major2'] ?>" name="major5">
        <input type="hidden" id="semester1" value="<?php echo $_POST['semester2'] ?>" name="semester5">
        
    </form>
    <button class="btn btn-primary mx-auto " id="back"><--Back</button>
    <button class="btn btn-success mx-auto" id="exportButton">Export to XLSX</button>

    </nav>


</div>

</div>
<div class="mx-auto" style="display: ruby-text; margin: 5px; " >
    
</div>
<div class="row">

    <div class="card-body">

       
        <div class="table-responsive" >
<table cellpadding="0" class="table table-bordered"  style="width: 100%;" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>Subject Number</th>
            <th>Subject Name</th>
            <th>Section Number</th>
            <th>day</th>
            <th>time</th>
            <th>Hall</th>
            <th>Number of Student</th>
            <th>techer</th>
        </tr>
    </thead>
    <tbody id="table">

<?php
while ($row = $scedual_res->fetch_assoc()) {
    $student_count = 0;
    $sql = "SELECT * FROM statistics";
    $result = $conn->query($sql);
    while ($stat_res = $result->fetch_assoc()) {
        if ($stat_res['subject_num'] == $row['subject_id']) {
            $student_count = $stat_res['num_of_study'];
        }
    }
    if(isset($_POST['major2'])){

        $selectsub = "SELECT * FROM `subjects` WHERE major_id=".$_POST['major2']." and semester= ".$_POST['semester2']." and subject_id like '$mm%' ";
        $sub_result = $conn->query($selectsub);
        if (mysqli_num_rows($sub_result) > 0) {
            
            echo "<tr>";    
            echo "<td>" . $row['subject_id'] . "</td>";
            echo "<td>" . $row['subject_name'] . "</td>";
            echo "<td>" . $row['section'] . "</td>";
            echo "<td>" . $row['day'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['hall'] . "</td>";
            echo "<td>" . $row['student_num'] . "</td>";
            echo "<td>" . $row['techer'] . "</td>";
            echo "</tr>";
        }
    }
}
echo "</tbody></table>";

$conn->close();
?>
</div>
</div>
        </div>

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script>
        $('#back').click(function() {
        $('#backfrm').submit();
        });
        document.getElementById('exportButton').addEventListener('click', function () {
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.table_to_sheet(document.querySelector('table'));

            XLSX.utils.book_append_sheet(wb, ws, 'Schedule');

            XLSX.writeFile(wb, document.getElementById('xlsx').value);
        });
    </script>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
