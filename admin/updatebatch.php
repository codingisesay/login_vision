<?php
session_start();
include('../database_connection.php');
include('../testing/testing_functions.php');
if(!isset($_SESSION['admin_id'])){
	header('location:index.php');

}
?>
<?php 
if(isset($_REQUEST['submit'])){

$batch_code = trim($_REQUEST['batch_code']);
// $batch_name = trim($_REQUEST['batch_name']);
$batch_short_name = trim($_REQUEST['batch_short_name']);
// $batch_timing = trim($_REQUEST['batch_timing']);
$batch_year = trim($_REQUEST['batch_year']);
$offline_students = trim($_REQUEST['offline_students']);
$online_student = trim($_REQUEST['online_student']);

$query = "UPDATE batch SET batch_short_name = '$batch_short_name', batch_year = '$batch_year', offline_students = '$offline_students', online_student = '$online_student' WHERE batch_code = '$batch_code'";
$run = mysqli_query($connect,$query);
if($run){?>
<script>
alert("Record Updated!!");
location.replace("edit_batch.php");
</script>
<?php

}else{?>
    <script>
    alert("Record Not Updated!!");
    location.replace("edit_batch.php");
    </script>
    <?php

}


}






?>