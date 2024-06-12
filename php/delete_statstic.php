<?php 
include '../connect.php';
$delete="DELETE FROM `statistics` ";
$conn->query($delete);
?>
<script>
    alert('delete sucses');
    window.location.href='../statstiac.php';

</script>