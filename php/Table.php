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
<h1><img src="C:\Users\DINA\Desktop\graduation project\الشاشة الرئيسية\Picture1.png" width="90" height="90"> teacher table </h1>
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
            <tr>
                <th rowspan="1">t1</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>

 
 
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