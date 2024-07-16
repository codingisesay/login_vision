<?php 
include('../session.php');
include('academicfeedbackFunction.php');

?>

<style>
  .select2-container .select2-selection--single{
    height:40px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
         border-radius: 0px !important; 
}

</style>
<?php

$fromdate = $_REQUEST['fromdate'];
$todate = $_REQUEST['todate'];
// $selectedvalue1 = "";
// $selectedvalue2 = "";
// $selectedvalue3 = "";
$selectedvalue1 = $_REQUEST['selectedvalue1'];
$selectedvalue2 = $_REQUEST['selectedvalue2'];
$selectedvalue3 = $_REQUEST['selectedvalue3'];

// $catogary = $_REQUEST['catogary']; //1-faculty, 2-batch Coordinator,3-batch
// $catogary = 1;

    // $dataForThreeDay = AcadmicForFillOrNot($fromdate,$todate);
    $dataForThreeDay = fetchDataForFacultyBatchCoordBatch($fromdate,$todate,$selectedvalue1,$selectedvalue2,$selectedvalue3);
    foreach($dataForThreeDay as $fd){
        $facutyAll[] = array("faculty" => $fd['faculty']);
    }
    
    $uniqueFaculty = array_unique($facutyAll,SORT_REGULAR);
    $uniqueFacultyreindex = array_values($uniqueFaculty);

    foreach($dataForThreeDay as $fd){
      $batch_coordinatorAll[] = array("batch_coordinator" => $fd['batch_coordinator']);
  }
  
  $uniquebatch_coordinator = array_unique($batch_coordinatorAll,SORT_REGULAR);
  $uniquebatchCoordinatorreindex = array_values($uniquebatch_coordinator);

  foreach($dataForThreeDay as $fd){
    $batch_All[] = array("batch" => $fd['batch']);
}

$uniquebatch = array_unique($batch_All,SORT_REGULAR);
$uniquebatchreindex = array_values($uniquebatch);

    
    // echo "<pre>";
    // print_r($uniqueFacultyreindex);
    ?>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
      <label for="sel1">Category:</label><br>
      <select class="form-control select2 selectedData" id="selectedvalue1" data-id='1'>
       <option value="<?php echo $selectedvalue1;?>"><?php echo $var1 = ($selectedvalue1 == "")?("Select faculty"):($selectedvalue1); ?></option>
       <?php 
       foreach($uniqueFacultyreindex as $fuD){?>
       
       <option value="<?php echo $fuD['faculty']; ?>"><?php echo $fuD['faculty']; ?></option>
       
       <?php

       }
       
       ?>
    
        
      </select>
      </div>

    </div>

    <div class="col-md-4">
    <div class="form-group">
      <label for="sel1">Category:</label><br>
      <select class="form-control select2 selectedData" id="selectedvalue2" data-id='2'>
       <option value="<?php echo $selectedvalue2;?>"><?php echo $var2 = ($selectedvalue2 == "")?("Select Batch Coordinator"):($selectedvalue2); ?></option>
       <?php 
       foreach($uniquebatchCoordinatorreindex as $bauD){?>
       
       <option value="<?php echo $bauD['batch_coordinator']; ?>"><?php echo $bauD['batch_coordinator']; ?></option>
       
       <?php

       }
       
       ?>
    
        
      </select>
      </div>

    </div>

    <div class="col-md-4">
    <div class="form-group">
      <label for="sel1">Category:</label><br>
      <select class="form-control select2 selectedData" id="selectedvalue3" data-id='3'>
       <option value="<?php echo $selectedvalue3;?>"><?php echo $var3 = ($selectedvalue3 == "")?("Select Batch"):($selectedvalue3); ?></option>
       <?php 
       foreach($uniquebatchreindex as $buD){?>
       
       <option value="<?php echo $buD['batch']; ?>"><?php echo $buD['batch']; ?></option>
       
       <?php

       }
       
       ?>
    
        
      </select>
      </div>

    </div>
    </div>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
    <button type="button" class="btn btn-info" id="clearbtn">Clear Category</button>
      </div>

    </div>
    </div>
      </div>
<script>
 
 $(document).ready(function(){
  $('.select2').select2();
 })   

</script>