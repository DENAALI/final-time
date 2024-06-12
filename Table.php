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
    color: black;
}

th {
    color: white;
    background-color: #4e73df;
}
 h1 img {
 display: inline-block;
      vertical-align: middle; /* Align the image vertically in the middle of the line */
      margin-right: 10px; /* Optional: Add some space between the image and text */
    }
      


</style>
</head>
<body>
<h1><img src="Picture1.png" width="90" height="90"> teacher table </h1>
 <button id="backButton" style="float: left;">Back</button>
    <button id="exportButton" style="float: left;">Export to Excel</button>
    <table>
        <thead>
            <tr>
              
                 <th rowspan="1">Day</th>
                <th colspan="6">Sunday-Tuesday-Thursday</th>
                <th colspan="2">Sunday-Tuesday</th>
                
               <th colspan="6">Monday-Wednesday</th>
                     
                
            </tr>
            <tr>
                <th rowspan="1">time</th>
                <th>8-9</th>
                <th>9-10</th>
                <th>10-11</th>
                <th>11-12</th>
                <th>12-13</th>
                <th>13-14</th>
                <th>14-15:30</th>
                <th>15:30-17</th>
                <th>8-9:30</th>
                <th>9:30-11</th>
                <th>11-12:30</th>
                <th>12:30-14</th>
                <th>14-15:30</th>
                <th>15:30-17</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'connect.php';
            $tims=[
                '8_9',
                '9_10',
                '10_11',
                '11_12',
                '12_13',
                '13_14',
                '14-15:30',
                '15:30-17',
                '8-9:30',
                '9:30_11',
                '11_12:30',
                '12:30_14',
                '14_15:30',
                '15:30_17',
                ];
            $select="SELECT * FROM `schedule` where subject_id not like '%Lab' or subject_id not like '%LAB' or subject_id not like '%lab'  GROUP by techer"; 
            $select_hall="";
            $result=mysqli_query($conn,$select);   
            while($row=mysqli_fetch_assoc($result)){
                if($row['techer']=='non'||$row['techer']==null)
                continue;
                echo "<tr>
                <th rowspan='1'>".$row['techer']."</th>";
                foreach($tims as $time){
                    $select_all="SELECT * FROM `schedule` where time='".$time."' and techer= '".$row['techer']."'"; 
                    $all_result=$conn->query($select_all);
                    if($all_result->num_rows != 0){
                        $all_row=mysqli_fetch_assoc($all_result);
                        if(isset($all_row['techer'])){
                            if($all_row['techer']==$row['techer']&&$all_row['time']==$time){
                                echo "<td>".$all_row['subject_name'].'---('.$all_row['hall'].")</td>";
                            }else{
                                echo "<td></td>";
                            }
                        }else{
                            echo "<td></td>";
                        }
                    // $all_result=$conn->query($select_all);
                    }else{
                        echo "<td></td>";
                    }
                    // }
                }
                echo "</tr>";
            }
            ?>
            
        </tbody>
    </table>
 <script>
document.getElementById('backButton').addEventListener('click', function() {
    history.back();
});

document.getElementById('exportButton').addEventListener('click', function() {
            exportTableToExcel('teacherTable', 'teacher_schedule');
        });

        function exportTableToExcel(tableID, filename = ''){
            var downloadLink;
            var dataType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // Create a new Blob with the tableHTML
            var blob = new Blob(['\ufeff', tableHTML], { type: dataType });

            // Create a link element
            downloadLink = document.createElement("a");

            // Set the file name
            filename = filename ? filename + '.xls' : 'excel_data.xls';

            // Create a link to the file
            downloadLink.href = URL.createObjectURL(blob);

            // Setting the file name
            downloadLink.download = filename;

            // Triggering the function
            downloadLink.click();
        }
</script>
</body>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>