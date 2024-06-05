<?php
session_start();
if ($_SESSION['teacher_id'] == null) {
    header('Location: login.php');
    exit();
}

include('includes/header.php'); 
include('includes/navbar.php'); 
include('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Choose Courses</title>
    <style>
td, th {
  text-align: center;
}
        </style>
</head>

<body>
    <div class="content">
        <div class="container">
            <h2 class="mb-5">Choose Courses</h2>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>

                            <th scope="col">Subject Name</th>
                            <th scope="col">Cheack</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "
                          SELECT 
                            s.subject_id AS subject_id,
                            s.name AS subject_name,
                            st.num_of_study,
                            s.Capacity,
                            CEIL(st.num_of_study / s.Capacity) AS sections
                          FROM 
                            subjects s
                          JOIN 
                            statistics st ON s.subject_id = st.subject_num
                        ";

                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>
                                
                                    <td>' . htmlspecialchars($row['subject_id']) . '</td>
                                    <td>' . htmlspecialchars($row['subject_name']) . '</td>

                                    <th scope="row">
                                    <label class="control control--checkbox">
                                        <input type="checkbox" name="select[]" value="' . htmlspecialchars($row['subject_name']) . '" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </th>
                                </tr>
                                <tr class="spacer">
                                    <td colspan="100"></td>
                                </tr>';
                            }
                        } else {
                            echo "<tr><td colspan='5'>No data available</td></tr>";
                        }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>

            <button type="button" id="saveButton" class="btn btn-primary">Save</button>
            <button type="button" onclick="history.back()" class="btn btn-secondary">Back</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#saveButton').on('click', function () {
                var selectedSubjects = [];
                $('input[name="select[]"]:checked').each(function () {
                    selectedSubjects.push($(this).val());
                });

                if (selectedSubjects.length > 0) {
                    $.ajax({
                        type: 'POST',
                        url: 'save_courses.php',
                        data: { select: selectedSubjects },
                        success: function (response) {
                            alert(response);
                            // Redirect or update the page as needed
                        },
                        error: function () {
                            alert('Error saving data.');
                        }
                    });
                } else {
                    alert('Please select at least one subject.');
                }
            });
        });
    </script>
</body>

</html>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
