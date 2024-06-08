<?php
include_once(__DIR__ . '/../connect.php');

// Function to get major name by ID
function get_name_major_by_id($conn, $id)
{
    $sql = "SELECT major_name FROM major WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['major_name'];
    }
    return "Unknown"; // Return a default value if major not found
}

// Get search term
$search = isset($_POST['search']) ? $_POST['search'] : '';

// Search query
$sql = "SELECT * FROM subjects WHERE 
        name LIKE '%$search%' OR 
        type_name LIKE '%$search%' OR 
        year LIKE '%$search%' OR 
        semester LIKE '%$search%' OR 
        major_id LIKE '%$search%' OR 
        subject_id LIKE '%$search%' OR 
        pre_sub_num LIKE '%$search%' OR 
        Capacity LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // $name_major = get_name_major_by_id($conn, $row['major_id']);
        // <td>' . htmlspecialchars($name_major) . '</td>
        echo '<tr id="row-' . htmlspecialchars($row['id']) . '">
            <td>' . htmlspecialchars($row['year']) . '</td>
            <td>' . htmlspecialchars($row['semester']) . '</td>
           
            <td>' . htmlspecialchars($row['subject_id']) . '</td>
            <td>' . htmlspecialchars($row['pre_sub_num']) . '</td>
            <td>' . htmlspecialchars($row['name']) . '</td>
            <td>' . htmlspecialchars($row['type_name']) . '</td>
            <td>' . htmlspecialchars($row['Capacity']) . '</td>
            <td>
                <button type="button" class="btn btn-success edit-btn" data-id="' . htmlspecialchars($row['id']) . '" data-name="' . htmlspecialchars($row['name']) . '" data-course_id="' . htmlspecialchars($row['subject_id']) . '" data-pre_course_id="' . htmlspecialchars($row['pre_sub_num']) . '" data-major_id="' . htmlspecialchars($row['major_id']) . '" data-type="' . htmlspecialchars($row['type_name']) . '" data-capacity="' . htmlspecialchars($row['Capacity']) . '" data-year="' . htmlspecialchars($row['year']) . '" data-term="' . htmlspecialchars($row['semester']) . '">EDIT</button>
            </td>
            <td>
                <button type="button" class="btn btn-danger delete-btn" data-id="' . htmlspecialchars($row['id']) . '">DELETE</button>
            </td>
        </tr>';
    }
} else {
    echo "<tr><td colspan='10'>No data available</td></tr>";
}

mysqli_close($conn);
?>
