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
<?php
// Ensure you have connected to the database before this script
// $conn = mysqli_connect("host", "username", "password", "database");

$sql = "
    SELECT 
        t.id AS id,
        t.name AS teacher_name,
        t.email AS teacher_email,
        t.degree AS teacher_degree,
        sub.id AS subject_id,
        sub.name AS subject_name,
        sub.year AS subject_year,
        sub.semester AS subject_semester,
        sub.type_name AS subject_type
    FROM 
        tetches te
    JOIN 
        teacher t ON te.techer_id = t.id AND te.state = 0
    JOIN 
        subjects sub ON te.subject_id = sub.subject_id 
    GROUP BY 
        t.name
";

$result = mysqli_query($conn, $sql);

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

                <!-- <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
                <div class="modal fade" id="hallModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add Hall</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="hallForm" method="POST" class="tm-contact-form">
                    <div class="modal-body">
                        <input type="hidden" name="hall_id" id="hall_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="hallName">Hall Name</label>
                                <input type="text" name="hallName" id="hallName" class="form-control" placeholder="Hall Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hallCapacity">Hall Capacity</label>
                                <input type="text" name="hallCapacity" id="hallCapacity" class="form-control" placeholder="Hall Capacity" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="theoretical">Theoretical</option>
                                <option value="laboratory">Laboratory</option>
                            </select>
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
                    Are you sure you want to delete this hall?
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
        hall Deleted successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
        Hall added successfully.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        Hall update successfully.
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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#hallModal" id="addHallBtn">Add Hall</button>
                        
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
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">Select</th>
                    <th scope="col">Teacher Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Year</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody id="searchResults">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                            <td>
                                <label class="control control--checkbox">
                                    <input type="hidden" name="id" value="'.$row['id'].'">
                                    <input type="checkbox" name="select[]" value="' . htmlspecialchars($row['subject_name']) . '" />
                                    <div class="control__indicator"></div>
                                </label>
                            </td>
                            <td>' . htmlspecialchars($row['teacher_name']) . '</td>
                            <td>' . htmlspecialchars($row['teacher_email']) . '</td>
                            <td>' . htmlspecialchars($row['teacher_degree']) . '</td>
                            <td>' . htmlspecialchars($row['subject_name']) . '</td>
                            <td>' . htmlspecialchars($row['subject_year']) . '</td>
                            <td>' . htmlspecialchars($row['subject_semester']) . '</td>
                            <td>' . htmlspecialchars($row['subject_type']) . '</td>
                        </tr>';
                    }
                } else {
                    echo "<tr><td colspan='8'>No data available</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
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

    $.ajax({
      url: 'php/search_hall.php',
      type: 'POST',
      data: {search: searchQuery},
      success: function(data) {
        $('#searchResults').html(data);
      }
    });
  });

  $('#add-hall').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      type: 'POST',
      url: 'php/add-hall.php',
      data: formData,
      success: function(response) {
        var jsonResponse = JSON.parse(response);
        if (jsonResponse.status === "success") {
          $('#successModal').modal('show');
          refreshTable();
        } else {
          console.error("Error adding hall: " + jsonResponse.message);
        }
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });

  function refreshTable() {
    $.ajax({
      url: 'php/search_hall.php',
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
        url: 'php/delete_hall.php',
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
</script>

     -->
    
<script>
$(document).ready(function(){
    // Trigger AJAX call on input change
    $('#searchInput').on('input', function() {
        var searchQuery = $(this).val();

        $.ajax({
            url: 'php/search_hall.php',
            type: 'POST',
            data: {search: searchQuery},
            success: function(data) {
                $('#searchResults').html(data);
            }
        });
    });

    // Handle add/edit form submission
    $('#hallForm').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'php/hall_action.php',
            data: formData,
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                    $('#hallModal').modal('hide');
                    if(jsonResponse.action=='update')
                    $('#successModalupdate').modal('show');
                  if(jsonResponse.action=='add')
                  $('#successModal').modal('show');
                  
                   
                    refreshTable();
                } else {
                    console.error("Error adding/updating hall: " + jsonResponse.message);
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
            url: 'php/search_hall.php',
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
        var type = $(this).data('type');
        var name = $(this).data('name');
        var capacity = $(this).data('capacity');

        $('#hall_id').val(id);
        $('#hallName').val(name);
        $('#hallCapacity').val(capacity);
        $('#type').val(type);
        $('#modalBtn').text('Update');
        $('#modalTitle').text('Edit Hall');
        $('#hallModal').modal('show');
    });

    // Handle delete button click
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        $('#delete_id').val(id);
        $('#confirmDeleteModal').modal('show');
    });

    // Handle delete confirmation
    $('#confirmDeleteButton').on('click', function() {
        var deleteId = $('#delete_id').val();

        $.ajax({
            url: 'php/delete_hall.php',
            type: 'POST',
            data: { delete_id: deleteId },
            success: function(response) {
                $('#confirmDeleteModal').modal('hide');
                $('#row-' + deleteId).remove();
                $('#successModalDelete').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Failed to delete hall.');
            }
        });
    });

    // Reset modal on add hall button click
    $('#addHallBtn').on('click', function() {
        $('#hallForm')[0].reset();
        $('#hall_id').val('');
        $('#modalBtn').text('Add');
        $('#modalTitle').text('Add Hall');
    });
});
</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>