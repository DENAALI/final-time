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
td, th {
  text-align: center;
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
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addTeacherForm" method="POST" class="tm-contact-form">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
            <input type="hidden" name="teacher_id" id="teacher_id">

              <label for="teacherName">Teacher Name</label>
              <input type="text" name="teacherName" class="form-control" id="teacherName" placeholder="Teacher Name" required />
            </div>
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password"  />
              <!-- <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="New Password"  /> -->
            </div>
            <div class="form-group col-md-6">
              <label for="major">Major</label>
              <select name="major" class="form-control" id="major" required>
                <?php echo $majorOptions; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6" id="myComboBox">
              <label for="active">Active</label>
              <select id="active" name="active" class="form-control" required>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="dateFrom">Date From</label>
              <input type="date" id="dateFrom" name="dateFrom" class="form-control" required />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="dateTo">Date To</label>
              <input type="date"    id="dateTo" name="dateTo" class="form-control" required />
</div>
<div class="form-group col-md-6">
<label for="Academic">Academic Degree</label>
<select name="Academic" class="form-control" id="Academic" required>
<option value="Bachelors">Bachelor's degree</option>
<option value="Postgraduate">Postgraduate Diploma</option>
<option value="Master">Master's degree</option>
<option value="other">Other</option>
</select>
</div>
</div>
<div class="form-group">
<label for="type">Type</label>
<select name="type-user" class="form-control" id="type-user" required>
<option value="Teacher">Teacher</option>
<option value="head">Head of Department</option>
<option value="admin">Admin</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit"  id="modalBtn" class="btn btn-primary">Add</button>
</div>
</form>
</div>

  </div>
</div>
<!-- <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this teacher?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="confirmDeleteButton" class="btn btn-danger">Delete</button>
        <input type="hidden" id="delete_id" />
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Teacher added successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModalUpdate" tabindex="-1" role="dialog" aria-labelledby="successModalUpdateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalUpdateLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Teacher updated successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModalDelete" tabindex="-1" role="dialog" aria-labelledby="successModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalDeleteLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Teacher deleted successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<!-- <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this teacher?
      </div>
      <div class="modal-footer">
        <form id="deleteForm" action="delete_teacher.php" method="post">
          <input type="hidden" name="delete_id" id="delete_id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div> -->

<div class="container-fluid">

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button> -->

                <!-- Topbar Search -->
                <form class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search">
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile" id="model-add">
            Add Teacher
        </button>
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
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this teacher?
      </div>
      <div class="modal-footer">
        <input type="hidden" id="delete_id" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteButton" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Teacher added successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModalUpdate" tabindex="-1" role="dialog" aria-labelledby="successModalUpdateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalUpdateLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Teacher updated successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="successModalDelete" tabindex="-1" role="dialog" aria-labelledby="successModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalDeleteLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Teacher deleted successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Email</th>
          <th scope="col">Name</th>
          <th scope="col">Department Number</th>
          <th scope="col">Degree</th>
          <th scope="col">Type</th>
          <th scope="col" colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody id="searchResults">
        <?php include_once("php/search_teacher.php") ?>
      </tbody>
    </table>
  </div>
</div>
<!-- /.container-fluid -->
<!-- Include jQuery if it's not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Check if the form submission event is already bound
    var formSubmitted = false;

    // Trigger AJAX call on input change
    $('#searchInput').on('input', function() {
        var searchQuery = $(this).val();

        $.ajax({
            url: 'php/search_teacher.php',
            type: 'POST',
            data: { search: searchQuery },
            success: function(data) {
                $('#searchResults').html(data);
            }
        });
    });

    // Handle add/edit form submission
    $('#addTeacherForm').submit(function(event) {
        // Prevent multiple form submissions
        // if (formSubmitted) {
        //     return false;
        // }
        
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'php/teacher_action.php',
            data: formData,
            success: function(response) {
                formSubmitted = true; // Mark the form as submitted
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    $('#addadminprofile').modal('hide');
                    if (jsonResponse.action == 'update') {
                        $('#successModalUpdate').modal('show');
                    } else if (jsonResponse.action == 'add') { // Use else if instead of separate if statements
                        $('#successModal').modal('show');
                        $.ajax({
            url: 'send_email.php',
            type: 'POST',
            data: { email: jsonResponse.email, otp: jsonResponse.value,name:jsonResponse.name},
            success: function(response) {
              alert("dddddddddddddddddddd");
                // $('#confirmDeleteModal').modal('hide');
                // $('#row-' + deleteId).remove();
                // $('#successModalDelete').modal('show');
                // refreshTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
                    }
                    refreshTable();
                } else {
                  // alert(jsonResponse.message);
                    console.error("Error adding/updating teacher: " + jsonResponse.message);
                }
            },
            error: function(xhr, status, error) {
              // alert(jsonResponse.message);

                // console.error(xhr.responseText);
            }
        });
    });

    // Function to refresh the table
    function refreshTable() {
        $.ajax({
            url: 'php/search_teacher.php',
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
    // Retrieve data attributes from the clicked button
    var id = $(this).data('id');
    var name = $(this).data('name');
    var email = $(this).data('email');
    var depar_num = $(this).data('depar_num');
    var type = $(this).data('type');
    var degree = $(this).data('degree');
    var dateFrom = $(this).data('date-from');
    var dateTo = $(this).data('date-to');
    var password = $(this).data('password'); // Retrieve the password value without hashing

    // Populate input fields in the modal with retrieved data
    $('#teacher_id').val(id);
    $('#teacherName').val(name);
    $('#email').val(email);
    $('#depar_num').val(depar_num);
    $('#type-user').val(type);
    $('#Academic').val(degree);
    $('#dateFrom').val(dateFrom);
    $('#dateTo').val(dateTo);
    $('#password').val(password);
    // $('#password').plesholders("dddddddddddddddd ");
    // Set the password field without hashing
    // $('#password').hide();
    // Update modal button and title
    $('#modalBtn').text('Update');
    $('#exampleModalLabel').text('Edit Teacher');

    // Show the modal
    $('#addadminprofile').modal('show');
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
            url: 'php/delete_teacher.php',
            type: 'POST',
            data: { delete_id: deleteId },
            success: function(response) {
                $('#confirmDeleteModal').modal('hide');
                $('#row-' + deleteId).remove();
                $('#successModalDelete').modal('show');
                refreshTable();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Reset form when opening add modal
    $('#model-add').on('click', function() {
        $('#addTeacherForm')[0].reset();
        $('#teacherName').val('');
        $('#modalBtn').text('Add');
        $('#exampleModalLabel').text('Add Teacher');
    });
})
</script>
<script>
          
        var value=  document.getElementById('active').value;
        if (value === 'yes') {
                dateTo.disabled = true;
                dateFrom.disabled = true;
            } 
        document.getElementById('active').addEventListener('change', function() {
          var dateTo = document.getElementById('dateTo');
              var dateFrom = document.getElementById('dateFrom');
            if (this.value === 'yes') {
                dateTo.disabled = true;
                dateFrom.disabled = true;
            } else
            {
              dateTo.disabled = false;
                dateFrom.disabled = false;
            }
        });
    </script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>