<?php
session_start();
if ($_SESSION['teacher_id'] == null) {
  header('Location: login.php');
  exit;
}
?>
<?php 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<head>
    <meta charset="UTF-8">
    <title>Teacher Table</title>
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
            text-align: center;
            color: black;
        }
        th {
            color: white;
            background-color: #4e73df;
        }
        h1 img {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<h1><img src="Picture1.png" width="90" height="90"> Teacher Table </h1>
<button id="backButton" style="float: left;">Back</button>
<button id="exportButton" style="float: left;">Export to Excel</button>
<table id="teacherTable">
    <thead>
        <tr>
            <th rowspan="1">Day</th>
            <th colspan="6">Sunday-Tuesday-Thursday</th>
            <th colspan="2">Sunday-Tuesday</th>
            <th colspan="6">Monday-Wednesday</th>
        </tr>
        <tr>
            <th rowspan="1">Time</th>
            <th>8_9</th>
            <th>9_10</th>
            <th>10_11</th>
            <th>11_12</th>
            <th>12_13</th>
            <th>13_14</th>
            <th>14_15:30</th>
            <th>15:30_17</th>
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
        include 'connect.php';
        $times = [
            '8_9', '9_10', '10_11', '11_12', '12_13', '13_14', '14-15:30', '15:30-17',
            '8-9:30', '9:30_11', '11_12:30', '12:30_14', '14_15:30', '15:30_17'
        ];
        $select = "SELECT * FROM `schedule` WHERE subject_id NOT LIKE '%Lab' OR subject_id NOT LIKE '%LAB' OR subject_id NOT LIKE '%lab' GROUP BY techer";
        $result = mysqli_query($conn, $select);   
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['techer'] == 'non' || $row['techer'] == null) continue;
            echo "<tr><th rowspan='1'>" . $row['techer'] . "</th>";
            foreach ($times as $time) {
                $select_all = "SELECT * FROM `schedule` WHERE time = '$time' AND techer = '" . $row['techer'] . "'"; 
                $all_result = $conn->query($select_all);
                if ($all_result->num_rows != 0) {
                    $all_row = mysqli_fetch_assoc($all_result);
                    if (isset($all_row['techer']) && $all_row['techer'] == $row['techer'] && $all_row['time'] == $time) {
                        echo "<td>" . $all_row['subject_name'] . '---(' . $all_row['hall'] . ")</td>";
                    } else {
                        echo "<td></td>";
                    }
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script>
document.getElementById('backButton').addEventListener('click', function() {
    history.back();
});

document.getElementById('exportButton').addEventListener('click', function() {
    exportTableToExcel('teacherTable', 'teacher_schedule');
});

function exportTableToExcel(tableID, filename = '') {
    var table = document.getElementById(tableID);
    var workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet1"});
    XLSX.writeFile(workbook, filename ? filename + '.xlsx' : 'teacher_schedule.xlsx');
}
</script>
</body>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
