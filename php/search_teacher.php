<?php
include_once(__DIR__ . '/../connect.php');

$search = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "SELECT * FROM teacher WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR degree LIKE '%$search%' OR type LIKE '%$search%' OR depar_num LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr id="row-' . htmlspecialchars($row['id']) . '">';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['depar_num']) . '</td>';
        echo '<td>' . htmlspecialchars($row['degree']) . '</td>';
        echo '<td>' . htmlspecialchars($row['type']) . '</td>';
        echo '<td>';
        echo '<div class="d-flex justify-content-center">';
        echo '<button type="button" class="btn btn-success edit-btn" data-id="' . htmlspecialchars($row['id']) . '" data-name="' . htmlspecialchars($row['name']) . '" data-email="' . htmlspecialchars($row['email']) . '" data-depar_num="' . htmlspecialchars($row['depar_num']) . '" data-type="' . htmlspecialchars($row['type']) . '" data-degree="' . htmlspecialchars($row['degree']) . '" data-date-from="' . htmlspecialchars($row['date_from']) . '" data-date-to="' . htmlspecialchars($row['date_to']) . '" data-password="' . htmlspecialchars($row['password']) . '">EDIT</button>';
        echo '</div>';
        echo '</td>';
        echo '<td>';
        echo '<div class="d-flex justify-content-center">';
        echo '<button type="button" class="btn btn-danger delete-btn"  data-id="' . htmlspecialchars($row['id']) . '">DELETE</button>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo "<tr><td colspan='8'>No data available</td></tr>";
}

mysqli_close($conn);
?>
