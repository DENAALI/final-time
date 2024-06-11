<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    
    <title>teacher Table</title>
<style>


button {
    padding: 10px;
    margin: 5px;
    cursor: pointer;
 
}
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
       width: 20px;
      height: 50px; 
    text-align: center;
}

th {
    background-color: #f2f2f2;
}
 h1 img {
 display: inline-block;
      vertical-align: middle; /* Align the image vertically in the middle of the line */
      margin-right: 10px; /* Optional: Add some space between the image and text */
    }
      


</style>
</head>
<body>
<h1><img src="../Picture1.png" width="90" height="90"> teacher table </h1>
 <button id="backButton" style="float: left;">Back</button>
    <button id="exportButton" style="float: left;">Export to Excel</button>
    <table>
        <thead>
            <tr>
              
                 <th rowspan="1">Day</th>
                <th colspan="6">Sunday-Tuesday-Thursday</th>
                
                
               <th colspan="6">Monday-Wednesday</th>
                     
                
            </tr>
            <tr>
                <th rowspan="1">time</th>
                <th>8_9</th>
                <th>9_10</th>
                <th>10_11</th>
                <th>11_12</th>
                <th>12_13</th>
                <th>13_14</th>
                
                <th>8_9:30</th>
                <th>9:30_11</th>
                <th>11_12:30</th>
                <th>12:30_14</th>
                <th>14_15:30</th>
                <th>15:30_17</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // $servername = "your_server";
            // $username = "your_username";
            // $password = "your_password";
            // $dbname = "your_database";

            // // Create connection
            // $conn = new mysqli($servername, $username, $password, $dbname);
            include '../connect.php';
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT `id`, `subject_id`, `subject_name`, `section`, `techer`, `time`, `day`, `hall`, `student_num` FROM `schedule`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{}</td>";
                    echo "<td>{$row['subject_name']}</td>";
                    echo "<td>{$row['section']}</td>";
                    echo "<td>{$row['techer']}</td>";
                    echo "<td>{$row['time']}</td>";
                    echo "<td>{$row['hall']}</td>";
                    echo "<td>{$row['student_num']}</td>";
                    echo "<td>{$row['subject_name']}</td>";
                    echo "<td>{$row['section']}</td>";
                    echo "<td>{$row['techer']}</td>";
                    echo "<td>{$row['time']}</td>";
                    echo "<td>{$row['hall']}</td>";
                    echo "<td>{$row['student_num']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No data found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
 <script>
document.getElementById('backButton').addEventListener('click', function() {
    history.back();
});

document.getElementById('exportButton').addEventListener('click', function() {
    // Replace the following line with your actual export to Excel logic
    alert('Exporting to Excel...');
});
</script>
</body>
</html>