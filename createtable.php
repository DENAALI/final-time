

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
include('connect.php');
?>
<?php
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<?php
require "connect.php";


?>



<div class="container-fluid">



<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                 

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <button class="btn btn-primary" data-toggle="modal" data-target="#hallModal" id="save_btn">save</button>
                    
                </li>
                
                <li class="nav-item">
                            <div style="width: 10px;" ></div>        
                </li>

              
            </ul>

        </nav>


    </div>
    <!-- End of Main Content -->

</div>


<div class="row">

    <div class="card-body">
        
        <div class="table-responsive">
            <form id="techers" action="./finaltable.php" name="techers" method="POST">
                <!-- <input type="hidden" id="major2" name="major2">
                <input type="hidden" id="semester2" name="semester2"> -->
                <button id="savde"  class="" style="display: none; "  type="submit">Save</button>
                
                <div class="tbl-content">
                    <table  class="table table-bordered" border=1 >
                        <thead>
                            <tr>
                <th>Subject Number</th>
                <th>Subject Name</th>
                <th>Section Number</th>
                <th>Number
                    of
                    Student</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Hall</th>
                    <th>Choose Teacher</th>
                </tr>
            </thead>
            <tbody id="table">
                <!-- Data will be inserted here dynamically -->
                <?php
             include('php/addscedual.php');
             ?>


</tbody>
</table>
</div>
</form>
</div>
</div>
</div>

<?php
$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);
if (mysqli_num_rows($result) == 0) {
    header("Location:php/tttt.php");
    exit;
}
?>

</div>

 


<script>
    $(document).ready(function() {
        // Handle click event for Generate button
        $("#save_btn").click(function() {
        $("#savde").click();

        });
        $("#genrate").click(function() {
            var major1 = $("#major1").val();
            var level1 = $("#level1").val();
            var semester1 = $("#semester1").val();
            
            document.getElementById('major2').value=major1;
            document.getElementById('semester2').value=semester1;
            
            $.ajax({
                type: 'POST',
                url: 'php/addscedual.php',
                data: { major1: major1, level1: level1, semester1: semester1 },
                success: function(response) {
                    $("#table").html(response); // Update the table based on the response
                    document.getElementById('savde').style.display="block";
                }
            });
        });
        // $("#savde").click(function(){
        //     var major1 = $("#major1").val();
        //     var semester1 = $("#semester1").val();
        //     $("#major2").val=major1;
        //     $("#semester2").val=semester1;

        // });
        // Handle form submission for Save button
       
    });
</script> 


<?php

  include('includes/scripts.php');
  include('includes/footer.php');
  ?>

