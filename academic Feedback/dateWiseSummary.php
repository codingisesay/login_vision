<?php 
include('../session.php');
include('academicfeedbackFunction.php');

?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script> 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script> 
  
</head>
<style>

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
  tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    } 

</style>

<body>
    <?php  
    include('academicfeedbackNavBar.php');
  
    ?>
    <br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
    <div class="form-group">
      <label for="sel1">From Date:</label>
      <input type="date" name="fromdate" id="fromdate" class="form-control">

    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
      <label for="sel1">To Date:</label>
      <input type="date" name="todate" id="todate" class="form-control">

    </div>
    </div>

  </div>
</div>
<div id="subcatoptions">

</div>

<div id="loadtable" style="overflow-x:auto;">

  
</div>


<div class="container">

  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width: 80%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">Feedback Report</h4>
        </div>
        <div class="modal-body">
 
  
</div>
</div>
<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

        </div>
        
      </div>
      
    </div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
$(document).ready(function(){
    $('#todate').on("change",function(){

    var fromdate = $('#fromdate').val();
    var todate = $('#todate').val();

    var selectedvalue1 = $('#selectedvalue1').val();
      var selectedvalue2 = $('#selectedvalue2').val();
      var selectedvalue3 = $('#selectedvalue3').val();
   
    
   if(fromdate == "" || todate == ""){

    alert("First Fill The dates");

   }else{

    $.ajax({
        url:"loadSubCatData.php",
        type:"POST",
        data:{fromdate:fromdate,todate:todate},
        success:function(data){

            $("#subcatoptions").html(data);


        }
    })

   }

    })

    $(document).on("change",".selectedData",function(){
      var fromdate = $('#fromdate').val();
      var todate = $('#todate').val();
      var selectedvalue1 = $('#selectedvalue1').val();
      var selectedvalue2 = $('#selectedvalue2').val();
      var selectedvalue3 = $('#selectedvalue3').val();
      // var catogary1 =  $('#selectedvalue1').data('id');
      // var catogary2 =  $('#selectedvalue2').data('id');
      // var catogary3 =  $('#selectedvalue3').data('id');


     
      $.ajax({
        url:'loaddatatableforsummary.php',
        type:'POST',
        data:{fromdate:fromdate,todate:todate,selectedvalue1:selectedvalue1,selectedvalue2:selectedvalue2,selectedvalue3:selectedvalue3},
        success:function(data){

          $("#loadtable").html(data);
          

          $.ajax({
            url:'loadSubCatData.php',
            type:'POST',
            data:{fromdate:fromdate,todate:todate,selectedvalue1:selectedvalue1,selectedvalue2:selectedvalue2,selectedvalue3:selectedvalue3},
            success:function(data){
              // data.preventDefault();
             
              $("#subcatoptions").html(data);

            }
          })
          
          
        }
  
      })
      
    })

    $(document).on("click",".view_checklist_detail",function(){
            var checklist_id = $(this).data("checklist_id");
           
            $.ajax({
                url:"loadSummarForClass.php",
                type:"POST",
                data:{checklist_id:checklist_id},
                success:function(data){
                    $(".modal-body").html(data);
                    
                }
            })
          
            

        })

        $(document).on("click","#clearbtn",function(){
          var fromdate = $('#fromdate').val();
      var todate = $('#todate').val();
      var selectedvalue1 = "";
      var selectedvalue2 = "";
      var selectedvalue3 = "";

      $.ajax({
            url:'loadSubCatData.php',
            type:'POST',
            data:{fromdate:fromdate,todate:todate,selectedvalue1:selectedvalue1,selectedvalue2:selectedvalue2,selectedvalue3:selectedvalue3},
            success:function(data){
              // data.preventDefault();
             
              $("#subcatoptions").html(data);

            }
          })
        })
  
})

// $('.select2').select2();
    $('#myTable').DataTable();
    
</script>
</body>
