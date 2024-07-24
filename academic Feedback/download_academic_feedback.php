<?php 

include('../session.php');


?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
 table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px;
}
  </style>


<?php 

   include('academicfeedbackFunction.php');
    $checklist_id = $_GET['checklist_id'];
    $classID = ClassIdFromChecklistId($checklist_id);
    $feedbackdata = fetchDataFromAcadmicData($checklist_id);
    

    $classDetails = classDetailsFromClassID($classID);
    $original = $classDetails[0]['class date']; 
    $new = date("d-m-Y", strtotime($original));
    // $bat = str_replace(",","<br>",$classDetails[0]['batch']);
    $fac = $classDetails[0]['faculty'];
  $x = $new.'_'.$fac.'.doc';
//   die();
    // echo "<pre>";
    // print_r($ClassDetails); 

        // ob_clean();
        
        // header("Content-Disposition: attachment; filename=abc.xls"); 
        // header("Content-Type:   application/vnd.ms-excel; charset=utf-8");

        header('Content-Type: application/doc');
        header('Content-Disposition: attachment; filename="'.$x.'"');
        // header('Content-Type: application/pdf');
        // header('Content-Disposition: attachment; filename="'.$x.'"');


        ?>
  <div class="container">
<table >

    <tr>
      <td>Class ID</td>
      <td><?php echo $classID;?></td>
    </tr>

    <tr>

        <td>Date</td>
        <td><?php $originalDate = $classDetails[0]['class date']; 
       echo $newDate = date("d-m-Y", strtotime($originalDate));
        ?></td>
    </tr>
    <tr>
        <td>Batch</td>
        <td><?php 
        echo str_replace(",","<br>",$classDetails[0]['batch']);
         
        
        ?></td>
    </tr>
    <tr>
        <td>Subject</td>
        <td><?php echo $classDetails[0]['subject']; ?></td>
    </tr>

    <tr>
        <td>Faculty</td>
        <td><?php echo $classDetails[0]['faculty'];?></td>
    </tr>
    <tr>
        <td>Coordinator</td>
        <td><?php echo preg_replace('/[0-9-]/',"",$classDetails[0]['batch_coordinator']); ?></td>
    </tr>
    <tr>
        <td>No of Students present in the class</td>
        <td><?php echo $classDetails[0]['attendance']; ?></td>
    </tr>
    <tr>
        <td>No of students active on response portal (max)</td>
        <td><?php echo $classDetails[0]['response']; ?></td>
    </tr>
    <tr>
        <td>Class Start Time</td>
        <td><?php echo $feedbackdata[0]['class_start_time'];?></td>
    </tr>
    <tr>
        <td>Is class Delay?</td>
        <td><?php echo $feedbackdata[0]['class_delay'];?><br>
        
            <?php echo $feedbackdata[0]['class_delay_remark']; ?></td>
            
            
    </tr>

    <tr>
        <td>End Time</td>
        <td><?php echo $feedbackdata[0]['class_end_time']; ?></td>
    </tr>
    <tr>
        <td>If the class ended early, reasons for the same</td>
        <td>
            <?php echo $feedbackdata[0]['class_end_early']; ?>
            <br><?php echo $feedbackdata[0]['end_early_class_remark']; ?></td>
    </tr>
    <tr>
        <td>Video/Synopsis/AQ/STQ/Handouts/PPTs <br> of the previous class correctly uploaded<br>
         (Irrespective of which batch coordinator attended that class)</td>
        <td><?php echo $feedbackdata[0]['previous_class_VSASHP_uploaded']; ?><br>
        <?php echo $feedbackdata[0]['video_synopsis_uploaded_remark']; ?></td>
    </tr>
    <tr>
        <td>Synopsis of previous class was shown on projector before Faculty entered</td>
        <td><?php echo $feedbackdata[0]['synopsis_shown_projector'];?>
         <br><?php echo $feedbackdata[0]['synopsis_previous_class_display_remark'];?></td>
    </tr>
    <tr>
        <td>Brief review of the previous class?</td>
        <td>
            <?php echo $feedbackdata[0]['review_of_previous_class']; ?>
          
        </td>
    </tr>
    <tr>
        <td>Q/A related to previous class?</td>
        <td>
         <?php echo $feedbackdata[0]['QA_related_to_previous_class']; ?>
           </td>
    </tr>
    <tr>
        <td>Were doubts rephrased/repeated to the class for the online students?</td>
        <td>
            <?php echo $feedbackdata[0]['doubts_repeated_by_online_student'];?>
         
       </td>
    </tr>

    <tr>
        <td>Number of LIVE Queries asked in the Class (approx.)</td>
        <td><?php echo $feedbackdata[0]['No_of_live_query'];?></td>
    </tr>
    <tr>
        <td>Did the faculty primarily used Hindi/English<br> (as per the medium) for teaching and communication</td>
        <td>
           <?php echo $feedbackdata[0]['faculty_primarily_used_language'];?>
            </td>
    </tr>
    <tr>
        <td>What percentage of time in the class the faculty used a secondary language?</td>
        <td><?php echo $feedbackdata[0]['percentage_secondary_language']."%"; ?></td>
    </tr>
    <tr>
        <td>Transition from one topic to another was smooth and appropriate <br>time was given to the students to grasp before moving on to another topic?</td>
        <td>
            <?php echo $feedbackdata[0]['transition_from_one_topic_to_another']; ?>
            </td>
    </tr>
    <tr>
        <td>Q/A related to class (including UPSC relevance)</td>
        <td>
            <?php echo $feedbackdata[0]['QA_related_to_class_UPSC']; ?>
            </td>
    </tr>
    <tr>
        <td>Were questions asked by students during class?</td>
        <td>
            <?php echo $feedbackdata[0]['question_by_student_during_class']; ?>
           </td>
    </tr>
    <tr>
        <td>Were there any questions not replied in the class (ignored or postponed)?</td>
        <td>
            <?php echo $feedbackdata[0]['any_questions_not_replied_class']; ?>   
        <br><?php echo $feedbackdata[0]['question_not_replied_by_faculty_remark'];?></td>
    </tr>
    <tr>
        <td>Were there any questions not replied from the prompter (ignored or postponed)?</td>
        <td>
            <?php echo $feedbackdata[0]['any_questions_not_replied_from_the_prompter']; ?>
            <br><?php echo $feedbackdata[0]['question_not_replied_by_faculty_prompter_remark']; ?></td>
    </tr>
    <tr>
        <td>Response Portal in the class?</td>
        <td>
            <?php echo $feedbackdata[0]['response_portal_in_the_class']; ?>

        </td>
    </tr>

    <tr>
        <td>After completion of class, a brief review of the class taken</td>
        <td>
            <?php echo $feedbackdata[0]['brief_review_after_completion']; ?>
         
    </td>
    </tr>
    <tr>
        <td>Major Topics Covered Today</td>
        <td><?php echo $feedbackdata[0]['major_topics_covered']; ?></td>
    </tr>
    <tr>
        <td>Was assignment of class confirmed with faculty?</td>
        <td>
        <?php echo $feedbackdata[0]['assignment_confirmed_with_faculty']; ?>
    </tr>
    <tr>
        <td>What question was given as assignment question in today's class<br> (Write the whole questions here)</td>
        <td><?php echo $feedbackdata[0]['assignment_question_today_class']; ?></td>
    </tr>
 
    <tr>
        <td>Did students interact with faculty after the class?</td>
        <td>
            <?php echo $feedbackdata[0]['students_interact_with_faculty']; ?>
            </td>
    </tr>
    <tr>
        <td>Any handout Used/Provided in the class?</td>
        <td>
            <?php echo $feedbackdata[0]['handout_provided']; ?>
            </td>
    </tr>
    <tr>
        <td>A Handout provided in the class was sent to the tech team for uploading?</td>
        <td>
            <?php echo $feedbackdata[0]['handout_provided_to_tech_team']; ?>
    </tr>
  

    <tr>
        <td>Preparation for the class</td>
        <td><?php 
        echo "Rating : ".$preparation_for_classRating = $feedbackdata[0]['preparation_for_class']."/5";
        
        ?> <br> 
        <?php echo $feedbackdata[0]['preparation_for_class_text'];?></td>
    </tr>
    <tr>
        <td>Objective of class - Did the faculty clearly state the objective of the class to the students?</td>
        <td><?php 
        echo "Rating : ".$objective_of_classRating = $feedbackdata[0]['objective_of_class']."/5";
        
        ?><br>
        <?php echo $feedbackdata[0]['objective_of_class_text'];?></td>
    </tr>
    <tr>
    <td>Command over the content</td>
    <td> <?php 
    echo "Rating : ".$command_over_contentRating = $feedbackdata[0]['command_over_content']."/5";
    ?><br>
     <?php echo $feedbackdata[0]['command_over_content_text'];?></td>
    </tr>
    <tr>
    <td>Use of Examples</td>
    <td><?php 
    echo "Rating : ".$use_of_examplesRating = $feedbackdata[0]['use_of_examples']."/5";
    ?><br>
            
      <?php echo $feedbackdata[0]['use_of_examples_text'];?></td>
    </tr>
    <tr>
    <td>Organization of content</td>
   <td> <?php 
    echo "Rating : ".$organization_of_contentRating = $feedbackdata[0]['organization_of_content']."/5";
    ?><br>     
      <?php echo $feedbackdata[0]['organization_of_content_text'];?></td>
    </tr>
    <tr>
        <td>Was dictation provided in the class?</td>
        <td>
            <?php echo $feedbackdata[0]['dictation_in_class'];?>
           </td>
    </tr>
    <tr>
        <td>Was the dictation provided in big chunks or part wise along with the flow of class?</td>
        <td>
           <?php echo $feedbackdata[0]['dictation_provided_in_big_chunks'];?>
            </td>
    </tr>
    <tr>
        <td>Approximately how many pages were dictated in the class?</td>
        <td><?php echo $feedbackdata[0]['no_pages_dictated_in_class'];?></td>
    </tr>
    <tr>
    <td>Link with Current Affairs</td>
    <td>
            <?php echo $feedbackdata[0]['linkwithcurrentaffair']; ?><br>
      
        <?php
        echo "Rating : ".$link_with_current_affairsRating = $feedbackdata[0]['link_with_current_affairs']."/5";
        
        
        ?></td>
        </tr>
    <tr>
        <td>Was the lecture focussed on both prelims and mains exam?</td>
        <td>
          <?php echo $feedbackdata[0]['lecture_focussed_on'];?>
           </td>
    </tr>
    <tr>
        <td>Factual errors or conceptual lags</td>
        <td>
           <?php echo $feedbackdata[0]['factual_errors_or_conceptual_lags'];?>
            <br><?php echo $feedbackdata[0]['factual_errors_or_conceptual_lags_text'];?>
    </td>
    </tr>
    <tr>
    <td>Time Management</td>
    <td><?php 
    echo "Rating : ".$time_managementRating = $feedbackdata[0]['time_management']."/5";
    
    ?><br>
        <?php echo $feedbackdata[0]['time_management_text']?></td>
       
    </tr>
    <tr>
    <td>Pace of the class</td>
    <td> <?php 
    echo $pace_of_the_classRating = $feedbackdata[0]['pace_of_the_class'];
    ?>
</td>
       
    </tr>
    <tr>
    <td>Use of Smart Board / PPT</td>
    <td><?php 
    echo "Rating : ".$use_of_smart_boardRating = $feedbackdata[0]['use_of_smart_board']."/5";
    
    ?><br>
       <?php echo $feedbackdata[0]['use_of_smart_board_text']; ?></td>
       
    </tr>
    <tr>
    <td>Energy level and communication</td>
    <td><?php 
   echo "Rating : ".$energy_level_and_communicationRating = $feedbackdata[0]['energy_level_and_communication']."/5";
    
    ?><br>
<?php echo $feedbackdata[0]['energy_level_and_communication_text'];?></td>
       
    </tr>
    <td>Did the faculty meet your expectations?</td>
        <td>
            <?php echo $feedbackdata[0]['faculty_meet_your_expectations'];?>
            </td>
       
    </tr>

    <tr id="whatDifferencedone">
        <td>What different you would have done?</td>
        <td><?php echo $feedbackdata[0]['different_done_you']; ?></td>
    </tr>

 
    <tr>
    <td>Overall Rating for the Class</td>
    <td>  <?php 
    echo "Rating : ".$overall_rating_for_the_classRating = $feedbackdata[0]['overall_rating_for_the_class']."/10";
    
    ?>
   </td>
       
    </tr>
    <tr>
        <td>feedback (Miscellaneous)</td>
        <?php 
        $Is_management_technical_issue_checked = $feedbackdata[0]['management_technical_issue'];
        $Is_specific_issue_highlighted_by_students_checked = $feedbackdata[0]['specific_issue_highlighted_by_students'];
        $Is_any_other_feedback_checked = $feedbackdata[0]['any_other_feedback'];
        
        ?>
        <td>
        <input type="checkbox" id="atAnyPoint" name="atAnyPoint" value="Yes" <?php echo ($Is_management_technical_issue_checked == "Yes")?("checked"):(""); ?> > Any other points including any management/technical issue<br>
         
      <?php echo $feedbackdata[0]['management_technical_issue_remark'];  ?><br><br><br>



        <input type="checkbox" id="issueHighlighted" name="issueHighlighted" value="Yes" <?php echo ($Is_specific_issue_highlighted_by_students_checked == 'Yes')?"checked":"" ?>> Any Specific issue highlighted or request made by student in today's
        class regarding anything related to Vision IAS services 
    
            <br> <?php echo $feedbackdata[0]['issue_highlight_by_student_remark'];  ?><br><br><br>



            <input type="checkbox" id="anyOtherFeedback" name="anyOtherFeedback" value="Yes" <?php echo ($Is_any_other_feedback_checked == 'Yes')?"checked":""; ?>> Any other Feedback<br>
        
<?php echo $feedbackdata[0]['any_other_feedback_comment'];?>
        </td>
    </tr>
    <tr>
        <td>Any Video Portion Needs to be removed?</td>
        <td>
           <?php echo $feedbackdata[0]['video_portion_removed'];?>
            <br><?php echo $feedbackdata[0]['video_portion_need_to_cut_remark'];?>
    </td>
    </tr>
    <tr>
        <td> Request for Feedback form sent to classroom team? (Only if it was the third class of the subject)</td>
        <td>
            <?php echo $feedbackdata[0]['feedback_form_classroom_team'];?>
    </td>
    </tr>
   
   

  </table>
  
        </div>





