<?php 
include('../session.php');
include('academicfeedbackFunction.php');

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="library/Excel-like-Bootstrap-Table-Sorting-Filtering-Plugin/dist/excel-bootstrap-table-filter-bundle.js"></script>
  <link rel="stylesheet" href="library/Excel-like-Bootstrap-Table-Sorting-Filtering-Plugin/src/excel-bootstrap-table-filter-style.css">

  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script> 

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
  
</head>

<?php 
include('academicfeedbackNavBar.php');
?>
<br>
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-6">
      <label>From Date</label>
      <input type="date" class="form-control" id="fromdate">
    </div>
    <div class="col-sm-6">
    <label>To Date</label>
      <input type="date" class="form-control" id="todate" >
    </div>
    <!-- <div class="col-sm-4">
      <input type="date" id='todate' class="form-control" placeholder="Enter password" name="pswd">
    </div> -->
 
  </div>
</div>
<br>
<br>

<div id="loadtables">

</div>

<div class="container">

  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
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


<script>
    $(document).ready(function(){
     $("#todate").on("change",function(){
    var fromdate = $("#fromdate").val();
    var todate = $("#todate").val();

    // alert('Akasdh');

    if(fromdate !="" && todate !=""){
        $.ajax({
        url:"loadMasterSheetData.php",
        type:"POST",
        data:{fromdate:fromdate,todate:todate},
        success:function(data){
            $("#loadtables").html(data);


        }
    })

    }else{
alert('Please Select Date First');
    }
    
  

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
       

    })


    
    $('#myTable0').excelTableFilter();
 $('#myTable1').excelTableFilter();
 $('#myTable2').excelTableFilter();
</script>

