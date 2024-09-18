<!-- <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> -->
<?php
error_reporting(0);
session_start();
include('../database_connection.php');
include('../testing/testing_functions.php');
if(!isset($_SESSION['admin_id'])){
	header('location:index.php');

}
?>
<?php 
$batchcode = trim($_POST['batchcode']);

// $batchcode = "6360";

$query="SELECT * FROM batch WHERE batch_code = '$batchcode'";

$run = mysqli_query($connect,$query);
while($data = mysqli_fetch_assoc($run)){

    $batchdata[] = $data; 

}
// echo "<pre>";
// print_r($batchdata);
// exit();

?>
<form action="updatebatch.php" method="POST">
<div class="container-fluid">

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Batch</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        <table class="table" border="1">
    <thead>
      <tr>
      <!-- <th>Batch code</th> -->
        <th>Batch Name</th>
        <th>Batch Short Name</th>
        <th>Batch Timing</th>
        <th>Batch Year</th>
        <th>Offline Students</th>
        <th>Online Student</th>
        <th>Update</th>
      </tr>
    </thead>
    
    <tbody>
          <tr>
          <input type="hidden" value="<?php echo $batchdata[0]['batch_code'];?>" name="batch_code" style="display:none;">
           <td><input type="text" value="<?php echo $batchdata[0]['batch_name'];?>" disabled name="batch_name"></td>
           <td><input type="text" value="<?php echo $batchdata[0]['batch_short_name'];?>" name="batch_short_name"></td>
           <td><input type="text" value="<?php echo $batchdata[0]['batch_timing'];?>" disabled name="batch_timing"></td>
           <td><input type="number" value="<?php echo $batchdata[0]['batch_year'];?>" name="batch_year"></td>
           <td><input type="number" value="<?php echo $batchdata[0]['offline_students'];?>" name="offline_students"></td>
           <td><input type="number" value="<?php echo $batchdata[0]['online_student'];?>" name="online_student"></td>
           <td><input type="submit" class="btn btn-success" value="Update" name="submit"></td>
        
   </tr> 
    </tbody>
    
  </table>
        </div>
      </div>
    </div>
   
  </div> 
</div>
</form>