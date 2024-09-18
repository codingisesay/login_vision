<?php 
session_start();

include('../testing/testing_functions.php');
if(!isset($_SESSION['admin_id'])){
	
	header('location:index.php');


}

?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<div class="container-fluid" style="padding-top:10px">
<a href="admin_home.php" type="button" class="btn btn-info">Home</a>
<a href="admin_logout.php" type="button" class="btn btn-info">LogOut</a>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
        <div class="input-group mb-3">
    <input type="number" class="form-control" id="batchcode" placeholder="Enter Batch Code.." required>
    <div class="input-group-append">
      <button class="btn btn-success" id="submitForLoadForCheckilst" type="submit" style="margin-top:10px;">Submit</button>  
     </div>
  </div>
    </div>
    </div>
</div>
<div id="loadclasses">

</div>


<script type="text/javascript" src="admin_js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#submitForLoadForCheckilst").on('click',function(){
            var batchcode = $("#batchcode").val();
            // console.log(selecteddate);
            if(batchcode != ""){

                $.ajax({
                url:"load_batch.php",
                type:"POST",
                data:{batchcode:batchcode},
                success:function(data){
                  $("#loadclasses").html(data);
                }
            })

            }else{
                alert("Please fill the batch code!!");
            }
          
        })
    })
</script>