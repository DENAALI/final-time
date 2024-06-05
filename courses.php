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
?>

<style>
  /* Custom CSS for form elements in the modal */
.modal-content .form-group {
    margin-bottom: 1rem;
}

.modal-content label {
    font-weight: bold;
}

  </style>
  <?php
include_once("connect.php");
// Database connection details

// Create connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch major names from the database
$sql = "SELECT id, major_name FROM major";
$result = $conn->query($sql);

// Generate the major options dynamically
$majorOptions = '';
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}

// Close the database connection

?>

<!-- <form id="contact-form" method="POST" class="tm-contact-form">
                                <div class="form-group">
               
                                    <input type="text" name="CoursesName" class="form-control rounded-0" placeholder="Courses Name" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="CoursesID" class="form-control rounded-0" placeholder="Courses ID" required />
        
                                </div>
                                <div class="form-group">
                <input type="text" name="precourseId" class="form-control rounded-0" placeholder="pre Course ID " required />

            </div>
                                <div class="form-group">
                                    <label for="major">Major:</label>
                                    <select name="major"  class="form-control" required>
                                     
                                 </select>
                                   
                                </div>
                                <div class="form-group">
                                <label for="type">type:</label>
                            <select name="type" required>
                                <option value="theoretical">theoretical  &#160; &#160; &#160;&#160; &#160; &#160;</option>
                                <option value="laboratory">laboratory</option>
                            </select>
</div>
                               
                </div> -->

    <!-- Modal for adding/editing course -->
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
                                <label for="courseName">Course Name</label>
                                <input type="text" name="courseName" id="courseName" class="form-control" placeholder="Course Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="courseID">Course ID</label>
                                <input type="text" name="courseID" id="courseID" class="form-control" placeholder="Course ID" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="preCourseID">Pre Course ID</label>
                                <input type="text" name="preCourseID" id="preCourseID" class="form-control" placeholder="Pre Course ID" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="major">Major</label>
                                <select name="major" id="major" class="form-control" required>
                                    <?php echo $majorOptions; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="theoretical">Theoretical</option>
                                    <option value="laboratory">Laboratory</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="capacity">Capacity</label>
                                <input type="text" name="capacity" id="capacity" class="form-control" placeholder="Capacity" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="year">Year</label>
                                <select name="year" id="year" class="form-control" required>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="term">Term</label>
                                <select name="term" id="term" class="form-control" required>
                                    <option value="1">First Term</option>
                                    <option value="2">Second Term</option>
                                    <option value="3">Third Term</option>
                                </select>
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


<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Courses added successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

           
                <!-- Topbar Search -->
                <form class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="searchInput-courses">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Add Teacher Button -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal" id="modalBtn-add">Add Course</button>

                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Content goes here -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
  <div class="card-body">
  <div class="modal fade" id="successModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Courses Deleted successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
   <!-- Confirm Delete Modal -->
   <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this course?
                    <input type="hidden" id="delete_id" name="delete_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmDeleteButton" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Courses update successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
      <th scope="col">Year</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Major ID</th>
                            <th scope="col">Subject ID</th>
                            <th scope="col">Pre Sub Num</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type Name</th>
                            <th scope="col">Capacity</th>
                         
        <th scope="col" colspan="2">&#160; Actions</th>
      </tr>
    </thead>
    <tbody id="searchResults">
      <?php include_once("php/search_courses.php") ?>
    </tbody>
  </table>
</div>
</div>

</div>
</div>
<!-- /.container-fluid -->
<!-- Include jQuery if it's not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- 
<script>
$(document).ready(function(){
  // Trigger AJAX call on input change
  $('#searchInput').on('input', function() {
    var searchQuery = $(this).val();

    // Perform AJAX request
    $.ajax({
      url: 'php/search_courses.php',
      type: 'POST',
      data: {search: searchQuery},
      success: function(data) {
        $('#searchResults').html(data);
      }
    });
  });

  $('#addCoursesForm').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      type: 'POST',
      url: 'php/add-course.php',
      data: formData,
      success: function(response) {

        var jsonResponse = JSON.parse(response);
        if (jsonResponse.status === "success") {
          $('#successModal').modal('show');
          refreshTable();
        } else {
          console.error("Error adding teacher: " + jsonResponse.message);
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });

  function refreshTable() {
    $.ajax({
      url: 'php/search_courses.php',
      type: 'POST',
      success: function(data) {
        $('#searchResults').html(data);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }
});
</script>
<script>
  $('#confirmDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // زر الحذف الذي تم الضغط عليه
    var id = button.data('id'); // استخراج معرف المعلم من خاصية data-id

    var modal = $(this);
    modal.find('#delete_id').val(id); // تعيين معرف المعلم في حقل الإخفاء داخل النموذج
  });
</script>
<script>
  $(document).ready(function() {
    var deleteId;

    // عند الضغط على زر الحذف، قم بإظهار المودال وتعيين معرف المعلم
    $(document).on('click', '.delete-btn', function() {
      deleteId = $(this).data('id');
      $('#delete_id').val(deleteId);
      $('#confirmDeleteModal').modal('show');
    });

    // عند تأكيد الحذف، قم بإرسال طلب AJAX إلى delete_teacher.php
    $('#confirmDeleteButton').on('click', function() {
      $.ajax({
        url: 'php/delete_courses.php',
        type: 'POST',
        data: { delete_id: deleteId },
        success: function(response) {
          $('#confirmDeleteModal').modal('hide');
          $('#row-' + deleteId).remove(); // إزالة الصف من الجدول
          $('#successModalDelete').modal('show');
          // refreshTable();
        },
        error: function(xhr, status, error) {
          console.log(error);
          alert('Failed to delete teacher.');
        }
      });
    });
  });
</script> -->
<script>
$(document).ready(function(){
    // Trigger AJAX call on input change
    $('#searchInput').on('input', function() {
        var searchQuery = $(this).val();

        $.ajax({
            url: 'php/search_courses.php',
            type: 'POST',
            data: {search: searchQuery},
            success: function(data) {
                $('#searchResults').html(data);
            }
        });
    });

    // Handle add/edit form submission
    $('#courseForm').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'php/course_action.php',
            data: formData,
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    $('#addCourseModal').modal('hide');
                    if(jsonResponse.action=='update')
                    $('#successModalupdate').modal('show');
                  if(jsonResponse.action=='add')
                  $('#successModal').modal('show');
                    refreshTable();
                } else {
                    console.error("Error adding/updating course: " + jsonResponse.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Function to refresh the table
    function refreshTable() {
        $.ajax({
            url: 'php/search_courses.php',
            type: 'POST',
            success: function(data) {
                $('#searchResults').html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Handle edit button click
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var course_id = $(this).data('course_id');
        var pre_course_id = $(this).data('pre_course_id');
        var major_id = $(this).data('major_id');
        var type = $(this).data('type');
        var capacity = $(this).data('capacity');
        var year = $(this).data('year');
        var term = $(this).data('term');

        $('#course_id').val(id);
        $('#courseName').val(name);
        $('#courseID').val(course_id);
        $('#preCourseID').val(pre_course_id);
        $('#major').val(major_id);
        $('#type').val(type);
        $('#capacity').val(capacity);
        $('#year').val(year);
        $('#term').val(term);
        $('#modalBtn').text('Update');
        $('#addCourseModalLabel').text('Edit Course');
        $('#addCourseModal').modal('show');
    });

    // Handle delete button click
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        $('#delete_id').val(id);
        $('#confirmDeleteModal').modal('show');
    });

    // Handle confirm delete button click
    $('#confirmDeleteButton').on('click', function() {
        var deleteId = $('#delete_id').val();

        $.ajax({
            url: 'php/delete_courses.php',
            type: 'POST',
            data: { delete_id: deleteId },
            success: function(response) {
                $('#confirmDeleteModal').modal('hide');
                $('#row-' + deleteId).remove();
                $('#successModalDelete').modal('show');
                successModalDelete
                refreshTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
$('#modalBtn-add').on('click', function() {
        $('#courseForm')[0].reset();
        $('#course_id').val('');
        $('#modalBtn').text('Add');
        $('#modalTitle').text('Add ad');
    });

</script>
    
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>