<?php 
include '../connect.php';


$delete='DELETE FROM `schedule`';
$conn->query($delete);
$delete='DELETE FROM `summer`';
$conn->query($delete);

?>
<script>
    alert('delete sucses');
    window.location.href='../Create_Table.php';

</script>