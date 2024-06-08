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
$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);
$sql123 = "SELECT * FROM statistics";
$result123 = $conn->query($sql123);
if(mysqli_num_rows($result123)!=0){
if(mysqli_num_rows($result)==0)
{
?>
<script>
    window.location.href = "php/tttt.php";
</script>
<?php
}}
?>
<?php
// require "connect.php";

$sql = "SELECT id, major_name FROM major";
$result = $conn->query($sql);

// Generate the major options dynamically
$majorOptions = '';
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}
?>
<div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="courseForm" method="POST" class="tm-contact-form">
                    <div class="modal-body">
                        <input type="hidden" name="course_id" id="course_id">
                       
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="theoretical">Theoretical</option>
                                    <option value="laboratory">Laboratory</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="capacity">Student Number</label>
                                <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Capacity" required>
                            </div>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="modalBtn" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
 

  <div class="container-fluid">

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal" id="modalBtn-add">Add Course</button>

        <!-- <ul class="navbar-nav ml-auto">
                <li class="nav-item"> -->

                    <label for="major"> major:</label>
                <select id="major1" name="major1" class="form-control bg-light border-0 small" style="font-size: large; width: 200px;">
                <?php echo $majorOptions; ?>
                </select>
    <!-- </li> -->

        <!-- <ul class="navbar-nav ml-auto">
                <li class="nav-item"> -->

                <label for="semester">semester:</label>
<select style="font-size: large;" class='form-control bg-light border-0 small' id="semester1" name="semester1">
    <option value="1">First term</option>
    <option value="2">Second term</option>
    <option value="3">Summer term</option>
</select>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <button class="btn btn-primary" data-toggle="modal" data-target="#hallModal" id="genrate">Genrate</button>
                    
                </li>
                
                <li class="nav-item">
                            <div style="width: 10px;" ></div>        
                </li>

                <li class="nav-item">
                <button  id="nextnext" style="display: none; "  class="btn btn-primary">next</button>
                </li>
                <li class="nav-item">
                <form id="next1" action="./create_summer.php" method="post">
<button  id="btnnext1" style="display: none; "  class="btn btn-primary">next</button>
<input type="hidden" id="major3"      name="major1">
<input type="hidden" id="semester3"  name="semester2">
</form>                </li>
            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
      
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>

  <!-- Content Row -->
  <div class="row">
  <div class="card-body">

  <div class="table-responsive">
       
<form id="create" action="createtable.php" method="post">
<input type="hidden" class="major2"    id="major2"   name="major5">
<input type="hidden"  id="semester2" name="semester5">
    <table cellpadding="0" class="table table-bordered" style="width: 100%;" id="" cellspacing="0" border="0">
        <thead>
            <tr>
                <th>Subject Number</th>
                <th>Subject Name</th>
                <th>Section Count </th>
                <th> Number of Student</th>
                
                <th>edite</th>
                <!-- <th>edite</th>
                <th>Hall</th> -->
                
            </tr>
        </thead>
        <tbody id="searchResults">
          
        </tbody>
    </table>
</form>
    </div>
</div>
  </div>
  </div>

  <!-- Content Row -->




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
   
   $("#nextnext").hide();
   $(document).ready(function() {
       $("#genrate").click(function() {
           var major1 = $("#major1").val();
           
           var semester1 = $("#semester1").val();

           if(semester1!=3){

               
               $.ajax({
                   type: 'POST',
                   url: 'php/gen.php',
                   data: {major1: major1,  semester1: semester1},
                   success: function(response) {
                       // console.log(major1); // تحقق من الاستجابة بعد النجاح
                       $("#searchResults").html(response); // تحديث الجدول بناءً على الاستجابة
                       document.getElementById('nextnext').style.display = 'block';
                       document.getElementById('btnnext1').style.display = 'none';
                       document.getElementById('major2').value = major1;
                       document.getElementById('semester2').value = semester1;
                       
                       
                   }
               });
           }else{

               $.ajax({
                   type: 'POST',
                   url: 'php/summer.php',
                   data: {major1: major1,  semester1: semester1},
                   success: function(response) {
                       console.log(response); // تحقق من الاستجابة بعد النجاح
                       $("#searchResults").html(response); // تحديث الجدول بناءً على الاستجابة
                       document.getElementById('btnnext1').style.display = 'block';
                       document.getElementById('nextnext').style.display = 'none';
                       document.getElementById('major3').value = major1;
                       document.getElementById('semester3').value = semester1;
                       console.log(major1);
                       
                   }
               });


           }
               

       });
   });

   $("#nextnext").click(function(){
       $("#create").submit();
       
   });
   $("#btnnext1").click(function(){
       $("#next1").submit();
       
   });

   function update(event,id){
       event.preventDefault();
   $.ajax({
               type: 'POST',
               url: 'php/update.php',
               data: {id1:id},
               success: function(response) {
                   // console.log(document.getElementById('count'+id).innerHTML.replace(""));
                   document.getElementById('count'+id).innerHTML=parseInt(document.getElementById('count'+id).innerHTML)-1;
                   alert(response);
                   console.log(response);
                   if(response=='done1'){
                       document.getElementById('row'+id).remove();
                   }
                   // console.log(major1); // تحقق من الاستجابة بعد النجاح
                   // $('#count'+id).html(parseInt($('#count'+id).html)+1); 
                   // document.getElementById('nextnext').style.display = 'block';

                  

               }
           });
  }
  $('#courseForm').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'php/add_ekhtear.php',
            data: formData,
            success: function(response) {
                var jsonResponse = response;
                if (jsonResponse) {
                    $('#addCourseModal').modal('hide');
                    if(jsonResponse=='update')
                    $('#successModalupdate').modal('show');
                  if(jsonResponse=='add')
                  $('#successModal').modal('show');
                    // refreshTable();
                    console.log(response);
                } else {
                    console.log("Error adding/updating course: " + jsonResponse.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

</script>


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>