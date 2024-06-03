<?php
include_once(__DIR__ . '/../connect.php');

$search = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "SELECT * FROM hall WHERE hall_name LIKE '%$search%' OR type_name LIKE '%$search%' OR hall_capacity LIKE '%$search%'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr id="row-' . htmlspecialchars($row['id']) . '">
                <td>' . htmlspecialchars($row['id']) . '</td>
                <td>' . htmlspecialchars($row['type_name']) . '</td>
                <td>' . htmlspecialchars($row['hall_name']) . '</td>
                <td>' . htmlspecialchars($row['hall_capacity']) . '</td>
                <td class="text-center">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-success edit-btn" data-id="' . htmlspecialchars($row['id']) . '" data-type="' . htmlspecialchars($row['type_name']) . '" data-name="' . htmlspecialchars($row['hall_name']) . '" data-capacity="' . htmlspecialchars($row['hall_capacity']) . '">EDIT</button>
                    </div>
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-danger delete-btn" data-id="' . htmlspecialchars($row['id']) . '">DELETE</button>
                    </div>
                </td>
            </tr>';
    }
} else {
    echo "<tr><td colspan='6'>No data available</td></tr>";
}

mysqli_close($conn);
?>
