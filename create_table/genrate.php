
<style>

table {
            text-align: center;
            width: 100%;
            table-layout: fixed;
            font-size: x-large;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .tbl-header {
            width: 99%;
            background-color: rgba(255, 255, 255, 0.3);
        }
        .tbl-content {
            height: 600px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        th, td {
            text-align: center;
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 14px;
            color: #088abd;
            text-transform: uppercase;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        th {
            text-align: center;
            border: double;
            font-size: large;
            background-color: #f2f2f2;
        }
        td {
            font-size: large;
            text-align: center;
            border: double;

            font-weight: 300;
         
            color: #242424;
        }
        select, button {
            font-size: large;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #088abd;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #066a9b;
        }

</style>

<?php
// require "connect.php";

$sql = "SELECT id, major_name FROM major";
$result = $conn->query($sql);

// Generate the major options dynamically
$majorOptions = '';
while ($row = $result->fetch_assoc()) {
    $majorOptions .= "<option value='" . $row['id'] . "'>" . $row['major_name'] . "</option>";
}
?>

<label for="major"> major:</label>
<select id="major1" name="major1" style="font-size: large; width: 200px;">
    <?php echo $majorOptions; ?>
</select>


<label for="semester">semester:</label>
<select style="font-size: large;" id="semester1" name="semester1">
    <option value="1">First term</option>
    <option value="2">Second term</option>
    <option value="3">Summer term</option>
</select>
<button id="genrate">generate</button>

<div class="tbl-header">
<?php
$sql = "SELECT * FROM schedule";
$result = $conn->query($sql);
$sql123 = "SELECT * FROM statistics";
$result123 = $conn->query($sql123);
if(mysqli_num_rows($result123)!=0){
if(mysqli_num_rows($result)==0)
{
?>
<script>
    window.location.href = "page/php/tttt.php";
</script>
<?php
}}
?>
<form id="next1" action="page/create_summer.php" method="post">
<button  id="btnnext1" style="display: none; margin: 10px; text-align: center; "  class="tm-btn tm-btn-primary text-center ">next</button>
<input type="hidden" id="major3"      name="major1">
<input type="hidden" id="semester3"  name="semester2">
</form>

<form id="create" action="page/createtable.php" method="post">
<button  id="nextnext" style="display: none; margin: 10px; text-align: center; "  class="tm-btn tm-btn-primary text-center ">next</button>
<input type="hidden" class="major2"    id="major2"   name="major5">
<input type="hidden"  id="semester2" name="semester5">
    <table cellpadding="0" style="width: 100%;" cellspacing="0" border="0">
        <thead>
            <tr>
                <th>Subject Number</th>
                <th>Subject Name</th>
                <th>Section Count </th>
                <th> Number of Student</th>
                
                <th>edite</th>
                <!-- <th>edite</th>
                <th>Hall</th> -->
                
            </tr>
        </thead>
        <tbody id="table">
            <?php include("php/gen.php"); ?>
        </tbody>
    </table>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   
    $("#nextnext").hide();
    $(document).ready(function() {
        $("#genrate").click(function() {
            var major1 = $("#major1").val();
            
            var semester1 = $("#semester1").val();

            if(semester1!=3){

                
                $.ajax({
                    type: 'POST',
                    url: 'page/php/gen.php',
                    data: {major1: major1,  semester1: semester1},
                    success: function(response) {
                        // console.log(major1); // تحقق من الاستجابة بعد النجاح
                        $("#table").html(response); // تحديث الجدول بناءً على الاستجابة
                        document.getElementById('nextnext').style.display = 'block';
                        document.getElementById('btnnext1').style.display = 'none';
                        document.getElementById('major2').value = major1;
                        document.getElementById('semester2').value = semester1;
                        
                        
                    }
                });
            }else{

                $.ajax({
                    type: 'POST',
                    url: 'page/summer.php',
                    data: {major1: major1,  semester1: semester1},
                    success: function(response) {
                        console.log(response); // تحقق من الاستجابة بعد النجاح
                        $("#table").html(response); // تحديث الجدول بناءً على الاستجابة
                        document.getElementById('btnnext1').style.display = 'block';
                        document.getElementById('nextnext').style.display = 'none';
                        document.getElementById('major3').value = major1;
                        document.getElementById('semester3').value = semester1;
                        console.log(major1);
                        
                    }
                });


            }
                

        });
    });

    $("#nextnext").click(function(){
        $("#create").submit();
        
    });
    $("#btnnext1").click(function(){
        $("#next1").submit();
        
    });

    function update(event,id){
        event.preventDefault();
    $.ajax({
                type: 'POST',
                url: 'page/php/update.php',
                data: {id1:id},
                success: function(response) {
                    // console.log(document.getElementById('count'+id).innerHTML.replace(""));
                    document.getElementById('count'+id).innerHTML=parseInt(document.getElementById('count'+id).innerHTML)-1;
                    alert(response);
                    console.log(response);
                    if(response=='done1'){
                        document.getElementById('row'+id).remove();
                    }
                    // console.log(major1); // تحقق من الاستجابة بعد النجاح
                    // $('#count'+id).html(parseInt($('#count'+id).html)+1); 
                    // document.getElementById('nextnext').style.display = 'block';

                   

                }
            });
   }

</script>

