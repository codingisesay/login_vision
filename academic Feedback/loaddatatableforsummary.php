<?php 
include('../session.php');
include('academicfeedbackFunction.php');

?>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
<style>
    /* table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
  tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    } */
/* .popuptext{
  color: black;
} */

.popupdiv{
  background-color:black; 
  display:none; 
  color:white; 
  padding:10px; 
  border-radius:10px;
   position:absolute;
    width:300px;
     z-index: 1; 
     line-height:2;

}
    
</style>
</head>
<?php 
$fromdate = $_REQUEST['fromdate'];
$todate = $_REQUEST['todate'];

$selectedvalue1 = $_REQUEST['selectedvalue1'];
$selectedvalue2 = $_REQUEST['selectedvalue2'];
$selectedvalue3 = $_REQUEST['selectedvalue3'];  

// $catogary1 = $_REQUEST['catogary1'];
// $catogary2 = $_REQUEST['catogary2'];
// $catogary3 = $_REQUEST['catogary3'];


    $FacultyBatchCoordBatch = fetchDataForFacultyBatchCoordBatch($fromdate,$todate,$selectedvalue1,$selectedvalue2,$selectedvalue3);

  //  echo "<pre>";
  //  print_r($FacultyBatchCoordBatch);
    
    ?>

<div class="container-fluid">
         
  <table class="table table-striped display" id="myTable">
    <thead>
      <tr>
      <th>Date</th>
        <th>Batch</th>
        <th>Subject</th>
        <th>Faculty</th>
        <th>Coordinator</th>
        <th>Class Start Time</th>
        <th>Overall Rating</th>
        <th>Major Topics Covered</th>
        <th>Language</th>
   
        <th>Dictation</th>
        <th>Factual Error</th>
        <th>Expectations</th>
        <th>Video Portion removed?</th>
        <th>Number of LIVE Queries (approx.)</th>
        <th>Miscellaneous</th>
        <th>Remarks/Comments</th>
        <th>View Form</th>
      </tr>
    </thead>
    <tbody>
   <?php 
   $i = 0;
   foreach($FacultyBatchCoordBatch as $facultydata){
    $i++;

    ?>
   
   <tr>
   <td><?php echo $facultydata['class_date']; ?></td>
        <td><?php echo $data = batchShortCode($facultydata['batch']); ?></td>
        <td><?php echo $facultydata['subject']; ?></td>
        <td><?php echo $facultydata['faculty']; ?></td>
        <td><?php echo $facultydata['batch_coordinator']; ?></td> 
        <td><a href="#" id="class_startTime<?php echo $i; ?>"><?php echo $facultydata['class_start_time']; ?></a>
        <div id="class_startTimepopup<?php echo $i; ?>" class="popupdiv">
<p><b class="popuptext">Is class Delayed? : </b><?php echo $facultydata['class_delay']; ?></p>
<p><b class="popuptext">Remark : </b><?php echo $facultydata['class_delay_remark']; ?></p>

   </div>
        
      
      </td>
  
        <td><a href="#" id="overallrating<?php echo $i; ?>"><?php echo $facultydata['overall_rating_for_the_class']; ?></a>
        <div id="popup<?php echo $i; ?>" class="popupdiv">
<p><b class="popuptext">Preparation for the class: </b><?php echo $facultydata['preparation_for_class'];?>/5</p>
<p><b class="popuptext">Objective of class: </b><?php echo $facultydata['objective_of_class']; ?>/5</p>
<p><b class="popuptext">Command over the content: </b><?php echo $facultydata['command_over_content'];?>/5<p>
<p><b class="popuptext">Use of Examples: </b><?php echo $facultydata['use_of_examples'];?>/5<p>
<p><b class="popuptext">Organization of content: </b><?php echo $facultydata['organization_of_content'];?>/5<p>
<p><b class="popuptext">Time Management: </b><?php echo $facultydata['time_management'];?>/5<p>
<p><b class="popuptext">Use of Smart Board / PPT: </b><?php echo $facultydata['use_of_smart_board'];?>/5<p>
<p><b class="popuptext">Energy level and communication: </b><?php echo $facultydata['energy_level_and_communication'];?>/5<p>

</div>
      </td>
        <td><?php echo $facultydata['major_topics_covered']; ?></td>
        <td><?php echo $facultydata['faculty_primarily_used_language']."(".$facultydata['percentage_secondary_language'].'%'.")"; ?></td>
       
        <td><?php echo $facultydata['dictation_in_class']."(".$facultydata['no_pages_dictated_in_class'].")"; ?></td>
        <td><a href="#" id="facultyError<?php echo $i; ?>"><?php echo $facultydata['factual_errors_or_conceptual_lags']; ?></a>
        <div id="facultyErrorpopup<?php echo $i; ?>" class="popupdiv">
<p>Remark : <?php echo $facultydata['factual_errors_or_conceptual_lags_text']; ?></p>

</div>
      
      
      </td>
        <td><a href="#" id="meetExpection<?php echo $i; ?>"><?php echo $facultydata['faculty_meet_your_expectations']; ?></a>
      
        <div id="meetExpectionpopup<?php echo $i; ?>" class="popupdiv">
<p>Remarks : <?php echo $facultydata['different_done_you']; ?></p>

</div>
      
      
      
      
      </td>
        <td><a href="#" id="videoPortion<?php echo $i; ?>"><?php echo $facultydata['video_portion_removed']; ?></a>
      
        <div id="videoPortionpopup<?php echo $i; ?>" class="popupdiv">
<p>Remarks : <?php echo $facultydata['video_portion_need_to_cut_remark'];?></p>

</div>
      
      
      </td>
        <td><?php echo $facultydata['No_of_live_query']; ?></td>
        <td>Management/Tech : <a hred="#" id="managemnet<?php echo $i; ?>"><?php echo $facultydata['management_technical_issue'];?></a><br>
        <div id="managemnetpopup<?php echo $i; ?>" class="popupdiv">
<p>Remarks : <?php echo $facultydata['management_technical_issue_remark']; ?></p>

</div>
            Issue by Student :<a href="#" id="IssueStu<?php echo $i; ?>"> <?php echo $facultydata['specific_issue_highlighted_by_students'];?></a><br>
            <div id="IssueStupopup<?php echo $i; ?>" class="popupdiv">

            <p>Remarks : <?php echo $facultydata['issue_highlight_by_student_remark']; ?></p>
</div>
            Other Feedback :<a href="#" id="otherFeed<?php echo $i; ?>"> <?php echo $facultydata['any_other_feedback'];?></a>
          
   

<div id="otherFeedpopup<?php echo $i; ?>" class="popupdiv">
<p>Remarks : <?php echo $facultydata['any_other_feedback_comment']; ?></p>

</div></td>
        <td><a href="#" id="Allremark<?php echo $i; ?>">Remarks</a>
      
        <div id="Allremarkpopup<?php echo $i; ?>" style="background-color:black; display:none; color:white; padding:10px; border-radius:10px; position:absolute; width:300px; z-index: 1; line-height:2;">
<p><b class="popuptext">Objective Of Class : </b><?php echo $facultydata['objective_of_class_text']; ?></p>
<p><b class="popuptext">Command over the content : </b><?php echo $facultydata['command_over_content_text']; ?></p>
<p><b class="popuptext">Use of Examples : </b><?php echo $facultydata['use_of_examples_text']; ?></p>
<p><b class="popuptext">Organization of content : </b><?php echo $facultydata['organization_of_content_text']; ?></p>
<p><b class="popuptext">Time Management : </b><?php echo $facultydata['time_management_text']; ?></p>
<p><b class="popuptext">Use of Smart Board / PPT : </b><?php echo $facultydata['use_of_smart_board_text']; ?></p>
<p><b class="popuptext">Energy level and communication : </b><?php echo $facultydata['energy_level_and_communication_text']; ?></p>

</div>
      
      
      </td>
        <td><a class="view_checklist_detail" data-checklist_id="<?php echo $facultydata['checklist_id'];?>"><button type="button"  class="btn btn-info" data-toggle="modal" data-target="#myModal">View</button></a></td>
        
      </tr>
   
   
   
   <?php

   }
   
   
   
   ?>
 
    </tbody>
  
  <tfoot>
  <tr>
  <th>Date</th>
        <th>Batch</th>
        <th>Subject</th>
        <th>Faculty</th>
        <th>Coordinator</th>
        <th>Class Start Time</th>
        <th>Overall Rating</th>
        <th>Major Topics Covered</th>
        <th>Language</th>
       
        <th>Dictation</th>
        <th>Factual Error</th>
        <th>Expectations</th>
        <th>Video Portion removed?</th>
        <th>Number of LIVE Queries (approx.)</th>
        <th>Miscellaneous</th>
        <th>Remarks/Comments</th>
        <th>View Form</th>
      </tr>
        </tfoot>
        </table>
</div>



<script>

new DataTable('#myTable', {
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                let column = this;
                let title = column.footer().textContent;
 
                // Create input element
                let input = document.createElement('input');
                input.placeholder = title;
                column.footer().replaceChildren(input);
 
                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== this.value) {
                        column.search(input.value).draw();
                    }
                });
            });
    }
});

$(document).ready(function(){
  var overAllRating = "<?php echo $i; ?>";
  // console.log(overAllRating);

  for (let i = 1; i <= overAllRating; i++) {
//for overall rating

    $("#overallrating"+i).mouseover(function(){
    
    $("#popup"+i).show();
  });

  $("#overallrating"+i).mouseout(function(){
    $("#popup"+i).hide();
  });

  $("#popup"+i).mouseover(function(){
    $(this).show();
  });

   $("#popup"+i).mouseout(function(){
    $(this).hide();
  });

//For class start time
  $("#class_startTime"+i).mouseover(function(){
    $("#class_startTimepopup"+i).show();
  });
  $("#class_startTime"+i).mouseout(function(){
    $("#class_startTimepopup"+i).hide();
  });
  $("#class_startTimepopup"+i).mouseover(function(){
    $(this).show();
  });
   $("#class_startTimepopup"+i).mouseout(function(){
    $(this).hide();
  });

//Faculty error

  $("#facultyError"+i).mouseover(function(){
    $("#facultyErrorpopup"+i).show();
  });
  $("#facultyError"+i).mouseout(function(){
    $("#facultyErrorpopup"+i).hide();
  });
  $("#facultyErrorpopup"+i).mouseover(function(){
    $(this).show();
  });
   $("#facultyErrorpopup"+i).mouseout(function(){
    $(this).hide();
  });
//faculty meet exxpections

  $("#meetExpection"+i).mouseover(function(){
    $("#meetExpectionpopup"+i).show();
  });
  $("#meetExpection"+i).mouseout(function(){
    $("#meetExpectionpopup"+i).hide();
  });
  $("#meetExpectionpopup"+i).mouseover(function(){
    $(this).show();
  });
   $("#meetExpectionpopup"+i).mouseout(function(){
    $(this).hide();
  });

//video portion removed

  $("#videoPortion"+i).mouseover(function(){
    $("#videoPortionpopup"+i).show();
  });
  $("#videoPortion"+i).mouseout(function(){
    $("#videoPortionpopup"+i).hide();
  });
  $("#videoPortionpopup"+i).mouseover(function(){
    $(this).show();
  });
   $("#videoPortionpopup"+i).mouseout(function(){
    $(this).hide();
  });

//managemnet issue

  $("#managemnet"+i).mouseover(function(){
    $("#managemnetpopup"+i).show();
  });
  $("#managemnet"+i).mouseout(function(){
    $("#managemnetpopup"+i).hide();
  });
  $("#managemnetpopup"+i).mouseover(function(){
    $(this).show();
  });
   $("#managemnetpopup"+i).mouseout(function(){
    $(this).hide();
  });

  //issue at student

  $("#IssueStu"+i).mouseover(function(){
    $("#IssueStupopup"+i).show();
  });
  $("#IssueStu"+i).mouseout(function(){
    $("#IssueStupopup"+i).hide();
  });
  $("#IssueStupopup"+i).mouseover(function(){
    $(this).show();
  });
   $("#IssueStupopup"+i).mouseout(function(){
    $(this).hide();
  });

//other feedbacks

  $("#otherFeed"+i).mouseover(function(){
    $("#otherFeedpopup"+i).show();
  });

  $("#otherFeed"+i).mouseout(function(){
    $("#otherFeedpopup"+i).hide();
  });
 
  $("#otherFeedpopup"+i).mouseover(function(){
    $(this).show();
  });

   $("#otherFeedpopup"+i).mouseout(function(){
    $(this).hide();
  });

//For all remark
  $("#Allremark"+i).mouseover(function(){
    $("#Allremarkpopup"+i).show();
  });

  $("#Allremark"+i).mouseout(function(){
    $("#Allremarkpopup"+i).hide();
  });

  $("#Allremarkpopup"+i).mouseover(function(){
    $(this).show();
  });

   $("#Allremarkpopup"+i).mouseout(function(){
    $(this).hide();
  });

  
  

}


});



</script>