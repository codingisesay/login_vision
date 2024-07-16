<?php 
include('../session.php');
include('academicfeedbackFunction.php');

?>
<?php 


 $checklist_id = trim($_POST['checklistid']);
 $section = $_POST['section'];

//sestion1 variable
 $ClassStartTime = trim(mysqli_real_escape_string($connect,$_REQUEST['ClassStartTime']));
 $ResionForDelay = trim(mysqli_real_escape_string($connect,$_REQUEST['resionfordelay']));
 $ClassEndTime = trim(mysqli_real_escape_string($connect,$_REQUEST['ClassEndTime']));
 $classendeatlyremark = trim(mysqli_real_escape_string($connect,$_REQUEST['classendeatlyremark']));
 $videoSynopsis = trim(mysqli_real_escape_string($connect,$_REQUEST['videoSynopsis']));
 $synopsisPrevious = trim(mysqli_real_escape_string($connect,$_REQUEST['synopsisPrevious']));
 $briefReview = trim(mysqli_real_escape_string($connect,$_REQUEST['briefReview']));
 $QAPreviousClass = trim(mysqli_real_escape_string($connect,$_REQUEST['QAPreviousClass']));
 $doubtsRephrasedRepeated = trim(mysqli_real_escape_string($connect,$_REQUEST['doubtsRephrasedRepeated']));
 $numberOfLiveQuery = trim(mysqli_real_escape_string($connect,$_REQUEST['numberOfLiveQuery']));
 $useHindiEnglish = trim(mysqli_real_escape_string($connect,$_REQUEST['useHindiEnglish']));


 //section2 variable
 $percenatgeofSecondaryLanguage = trim(mysqli_real_escape_string($connect,$_REQUEST['percenatgeofSecondaryLanguage']));
 $transitionOfTopic = trim(mysqli_real_escape_string($connect,$_REQUEST['transitionOfTopic']));
 $QARelatedToUPSC = trim(mysqli_real_escape_string($connect,$_REQUEST['QARelatedToUPSC']));
 $questionAskedByStudent = trim(mysqli_real_escape_string($connect,$_REQUEST['questionAskedByStudent']));
 $queryNotReplied = trim(mysqli_real_escape_string($connect,$_REQUEST['queryNotReplied']));
 $QuestionPrompter = trim(mysqli_real_escape_string($connect,$_REQUEST['QuestionPrompter']));
 $responseportalinclass = trim(mysqli_real_escape_string($connect,$_REQUEST['responseportalinclass']));
 $aftercompletionofclass = trim(mysqli_real_escape_string($connect,$_REQUEST['aftercompletionofclass']));
 $majortopiccomment = trim(mysqli_real_escape_string($connect,$_REQUEST['majortopiccomment']));
 $assignmentQuestionwithfaculty = trim(mysqli_real_escape_string($connect,$_REQUEST['assignmentQuestionwithfaculty']));
 $assignmentquestioncomment = trim(mysqli_real_escape_string($connect,$_REQUEST['assignmentquestioncomment']));



 $specificissuehighlight = trim(mysqli_real_escape_string($connect,$_REQUEST['issueHighlighted']));
 if($specificissuehighlight == ""){

    $specificissuehighlight = 'No';

 }


 //section3
 $studentinterectfaculty = trim(mysqli_real_escape_string($connect,$_REQUEST['studentinterectfaculty']));
 $hanoutinclass = trim(mysqli_real_escape_string($connect,$_REQUEST['hanoutinclass']));
 $handoutToTechteam = trim(mysqli_real_escape_string($connect,$_REQUEST['handoutToTechteam']));

 $managementtechnicalissue = trim(mysqli_real_escape_string($connect,$_REQUEST['atAnyPoint']));
 if($managementtechnicalissue == ""){

    $managementtechnicalissue = 'No';

 }


 $Preparationfortheclass = trim(mysqli_real_escape_string($connect,$_REQUEST['Preparationfortheclass']));
 $Preparationfortheclasscomment = trim(mysqli_real_escape_string($connect,$_REQUEST['Preparationfortheclasscomment']));
 $Objectiveofclas = trim(mysqli_real_escape_string($connect,$_REQUEST['Objectiveofclas']));
 $Objectiveofclascomment = trim(mysqli_real_escape_string($connect,$_REQUEST['Objectiveofclascomment']));
 $Commandoverthecontent = trim(mysqli_real_escape_string($connect,$_REQUEST['Commandoverthecontent']));
 $Commandoverthecontentcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['Commandoverthecontentcomment']));
 $UseofExamples = trim(mysqli_real_escape_string($connect,$_REQUEST['UseofExamples']));
 $UseofExamplescomment = trim(mysqli_real_escape_string($connect,$_REQUEST['UseofExamplescomment']));
 $Organizationofcontent = trim(mysqli_real_escape_string($connect,$_REQUEST['Organizationofcontent']));
 $Organizationofcontentcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['Organizationofcontentcomment']));
 $dictationinclass = trim(mysqli_real_escape_string($connect,$_REQUEST['dictationinclass']));
 $dictationinclasschunk = trim(mysqli_real_escape_string($connect,$_REQUEST['dictationinclasschunk']));
 $Approximatelypages = trim(mysqli_real_escape_string($connect,$_REQUEST['Approximatelypages']));
 $linkwithcurrentaffair = trim(mysqli_real_escape_string($connect,$_REQUEST['linkwithcurrentaffair']));
 $LinkwithCurrentAffairsrating = trim(mysqli_real_escape_string($connect,$_REQUEST['LinkwithCurrentAffairsrating']));


 //section4
 $lectureFocussed = trim(mysqli_real_escape_string($connect,$_REQUEST['lectureFocussed']));
 $Factualerrors = trim(mysqli_real_escape_string($connect,$_REQUEST['Factualerrors']));
 $Factualerrorscomment = trim(mysqli_real_escape_string($connect,$_REQUEST['Factualerrorscomment']));
 $TimeManagement = trim(mysqli_real_escape_string($connect,$_REQUEST['TimeManagement']));
 $TimeManagementcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['TimeManagementcomment']));
 $Paceoftheclas = trim(mysqli_real_escape_string($connect,$_REQUEST['Paceoftheclas']));
 $UseofSmartBoard = trim(mysqli_real_escape_string($connect,$_REQUEST['UseofSmartBoard']));
 $UseofSmartBoardcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['UseofSmartBoardcomment']));
 $Energylevel = trim(mysqli_real_escape_string($connect,$_REQUEST['Energylevel']));
 $Energylevelcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['Energylevelcomment']));
 $facultymeetyourexpectations = trim(mysqli_real_escape_string($connect,$_REQUEST['facultymeetyourexpectations']));
 $ratingofclass = trim(mysqli_real_escape_string($connect,$_REQUEST['ratingofclass']));

 $anyOtherFeedback = trim(mysqli_real_escape_string($connect,$_REQUEST['anyOtherFeedback']));
if($anyOtherFeedback == ""){

    $anyOtherFeedback = 'No';

 }


 $videoremoveportion = trim(mysqli_real_escape_string($connect,$_REQUEST['videoremoveportion']));
 $feedbackforclassroomteam = trim(mysqli_real_escape_string($connect,$_REQUEST['feedbackforclassroomteam']));

//remark table variable
//section1
 $resionfordelaycomment = trim(mysqli_real_escape_string($connect,$_REQUEST['resionfordelaycomment']));
 $classendeatlyremarkcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['classendeatlyremarkcomment']));
 $videoSynopsiscomment = trim(mysqli_real_escape_string($connect,$_REQUEST['videoSynopsiscomment']));
 $synopsisPreviouscomment = trim(mysqli_real_escape_string($connect,$_REQUEST['synopsisPreviouscomment']));

//section2
 $queryNotRepliedcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['queryNotRepliedcomment']));
 $QuestionPromptercomment = trim(mysqli_real_escape_string($connect,$_REQUEST['QuestionPromptercomment']));


 $differencedonecomment = trim(mysqli_real_escape_string($connect,$_REQUEST['differencedonecomment']));
 $specificissuehighlightcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['issueHighlightedcomment']));
 $managementtechnicalissuecomment = trim(mysqli_real_escape_string($connect,$_REQUEST['atAnyPointcomment']));
 $anyOtherFeedbackcomment = trim(mysqli_real_escape_string($connect,$_REQUEST['anyOtherFeedbackcomment']));
 $videoremoveportioncomment = trim(mysqli_real_escape_string($connect,$_REQUEST['videoremoveportioncomment']));



if($section == 'section1'){

   $queryacademic_feedback_record = "INSERT INTO `academic_feedback_record` (`class_start_time`, `class_delay`, `class_end_time`, `class_end_early`, `previous_class_VSASHP_uploaded`, `synopsis_shown_projector`, `review_of_previous_class`, `QA_related_to_previous_class`, `doubts_repeated_by_online_student`, `No_of_live_query`, `faculty_primarily_used_language`, `percentage_secondary_language`, `transition_from_one_topic_to_another`, `QA_related_to_class_UPSC`, `question_by_student_during_class`, `any_questions_not_replied_class`, `any_questions_not_replied_from_the_prompter`, `response_portal_in_the_class`, `brief_review_after_completion`, `major_topics_covered`, `assignment_confirmed_with_faculty`, `assignment_question_today_class`, `specific_issue_highlighted_by_students`, `students_interact_with_faculty`, `handout_provided`, `handout_provided_to_tech_team`, `management_technical_issue`, `preparation_for_class`, `preparation_for_class_text`, `objective_of_class`, `objective_of_class_text`, `command_over_content`, `command_over_content_text`, `use_of_examples`, `use_of_examples_text`, `organization_of_content`, `organization_of_content_text`, `dictation_in_class`, `dictation_provided_in_big_chunks`, `no_pages_dictated_in_class`, `linkwithcurrentaffair`, `link_with_current_affairs`, `lecture_focussed_on`, `factual_errors_or_conceptual_lags`, `factual_errors_or_conceptual_lags_text`, `time_management`, `time_management_text`, `pace_of_the_class`, `use_of_smart_board`, `use_of_smart_board_text`, `energy_level_and_communication`, `energy_level_and_communication_text`, `faculty_meet_your_expectations`, `overall_rating_for_the_class`, `any_other_feedback`, `video_portion_removed`, `feedback_form_classroom_team`, `checklist_id`, `insertedDateTime`)
    VALUES ('$ClassStartTime', '$ResionForDelay', '$ClassEndTime', '$classendeatlyremark', '$videoSynopsis', '$synopsisPrevious', '$briefReview', '$QAPreviousClass', '$doubtsRephrasedRepeated', '$numberOfLiveQuery', '$useHindiEnglish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, '$checklist_id', CURRENT_TIMESTAMP);";


        $runacademic_feedback_record = mysqli_query($connect,$queryacademic_feedback_record);
         if($runacademic_feedback_record){

          $query = "SELECT academic_feedback_record_id FROM academic_feedback_record WHERE checklist_id = '$checklist_id'";
          $run = mysqli_query($connect,$query);
          $data = mysqli_fetch_assoc($run);
          $academic_feedback_record_id = $data['academic_feedback_record_id'];
    
         $queryRemark = "INSERT INTO `academic_feedback_record_remark` (`class_delay_remark`, `end_early_class_remark`, `video_synopsis_uploaded_remark`, `synopsis_previous_class_display_remark`, `question_not_replied_by_faculty_remark`, `question_not_replied_by_faculty_prompter_remark`, `different_done_you`, `issue_highlight_by_student_remark`, `management_technical_issue_remark`, `any_other_feedback_comment`, `video_portion_need_to_cut_remark`, `academic_feedback_record_id`, `checklist_id`)
                                              VALUES ('$resionfordelaycomment', '$classendeatlyremarkcomment', '$videoSynopsiscomment', '$synopsisPreviouscomment', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$academic_feedback_record_id', '$checklist_id')";


                $runForRemark = mysqli_query($connect,$queryRemark);?>
                
                <script>

               alert("You have Completed Section 01 !!!");
               history.back();
               // $section = 'section2';
              

                </script>
                
                <?php
         }else{

            echo "Errorrr: " . $query . "<br>" . mysqli_error($connect);
            

         }

}else if($section == 'section2'){

   $queryForSectionTwo = "UPDATE academic_feedback_record SET 
   `percentage_secondary_language`='$percenatgeofSecondaryLanguage',
    `transition_from_one_topic_to_another`='$transitionOfTopic',
     `QA_related_to_class_UPSC`='$QARelatedToUPSC',
      `question_by_student_during_class`='$questionAskedByStudent',
       `any_questions_not_replied_class`='$queryNotReplied',
        `any_questions_not_replied_from_the_prompter`='$QuestionPrompter',
         `response_portal_in_the_class`='$responseportalinclass',
          `brief_review_after_completion`='$aftercompletionofclass',
           `major_topics_covered`='$majortopiccomment',
            `assignment_confirmed_with_faculty`='$assignmentQuestionwithfaculty',
             `assignment_question_today_class`='$assignmentquestioncomment' WHERE checklist_id = '$checklist_id'";

             $runqueryForSectionTwo = mysqli_query($connect,$queryForSectionTwo);

             if($runqueryForSectionTwo){
               $queryForUpdateSectionTwoRemark = "UPDATE academic_feedback_record_remark SET 
               `question_not_replied_by_faculty_remark`='$queryNotRepliedcomment',
               `question_not_replied_by_faculty_prompter_remark`='$QuestionPromptercomment' WHERE checklist_id = '$checklist_id'";
               $runqueryForUpdateSectionTwoRemark = mysqli_query($connect,$queryForUpdateSectionTwoRemark);

               if($runqueryForUpdateSectionTwoRemark){?>
               <script>
                  alert("You Have Completed Section 2 !!");
                  history.back();
                 
               </script>
               
               <?php

               }

              
               
             }else{

               echo "Errorrr: " . $query . "<br>" . mysqli_error($connect);

             }

}else if($section == 'section3'){

   $queryForSectionthree = "UPDATE academic_feedback_record SET 
   `students_interact_with_faculty`='$studentinterectfaculty',
    `handout_provided`='$hanoutinclass',
     `handout_provided_to_tech_team`='$handoutToTechteam',
       `preparation_for_class`='$Preparationfortheclass',
        `preparation_for_class_text`='$Preparationfortheclasscomment',
         `objective_of_class`='$Objectiveofclas',
          `objective_of_class_text`='$Objectiveofclascomment',
           `command_over_content`='$Commandoverthecontent',
            `command_over_content_text`='$Commandoverthecontentcomment',
             `use_of_examples`='$UseofExamples',
              `use_of_examples_text`='$UseofExamplescomment',
               `organization_of_content`='$Organizationofcontent',
                `organization_of_content_text`='$Organizationofcontentcomment',
                 `dictation_in_class`='$dictationinclass',
                  `dictation_provided_in_big_chunks`='$dictationinclasschunk',
                   `no_pages_dictated_in_class`='$Approximatelypages',
                   `linkwithcurrentaffair`='$linkwithcurrentaffair',
                    `link_with_current_affairs`='$LinkwithCurrentAffairsrating' WHERE checklist_id = '$checklist_id'";
                    $run = mysqli_query($connect,$queryForSectionthree);
                    if($run){?>
                    <script>
                     alert('You Have Completed section 3 !!');
                    
                     history.back();
                    </script>
                    
                    <?php

                    }else{
                     echo "Errorrr: " . $query . "<br>" . mysqli_error($connect);
                    }

}else if($section == 'section4'){

   $queryForSectionFour = "UPDATE academic_feedback_record SET 
   `lecture_focussed_on`='$lectureFocussed',
    `factual_errors_or_conceptual_lags`='$Factualerrors',
     `factual_errors_or_conceptual_lags_text`='$Factualerrorscomment',
      `time_management`='$TimeManagement',
       `time_management_text`='$TimeManagementcomment',
        `pace_of_the_class`='$Paceoftheclas',
         `use_of_smart_board`='$UseofSmartBoard',
          `use_of_smart_board_text`='$UseofSmartBoardcomment',
           `energy_level_and_communication`='$Energylevel',
            `energy_level_and_communication_text`='$Energylevelcomment',
             `faculty_meet_your_expectations`='$facultymeetyourexpectations',
              `overall_rating_for_the_class`='$ratingofclass',
              `management_technical_issue`='$managementtechnicalissue',
              `specific_issue_highlighted_by_students`='$specificissuehighlight',
               `any_other_feedback`='$anyOtherFeedback',
                `video_portion_removed`='$videoremoveportion',
                 `feedback_form_classroom_team`='$feedbackforclassroomteam' WHERE checklist_id = '$checklist_id'";

                 $run = mysqli_query($connect,$queryForSectionFour);

                 if($run){
                  $queryForUpdateSectionfourRemark = "UPDATE academic_feedback_record_remark SET 
                  `different_done_you`='$differencedonecomment',
                   `issue_highlight_by_student_remark`='$specificissuehighlightcomment',
                    `management_technical_issue_remark`='$managementtechnicalissuecomment',
                     `any_other_feedback_comment`='$anyOtherFeedbackcomment',
                      `video_portion_need_to_cut_remark`='$videoremoveportioncomment' WHERE checklist_id = '$checklist_id'";
                      $runForUpdateSectionfourRemark = mysqli_query($connect,$queryForUpdateSectionfourRemark);
                      if($runForUpdateSectionfourRemark){?>
                      <script>
                      alert('You Have Completed Section 4 !!');
                      history.back();
                      </script>
                      
                      <?php

                      }else{
                        echo "Errorrr: " . $query . "<br>" . mysqli_error($connect);
                      }
                 }else{

                  echo "Errorrr: " . $query . "<br>" . mysqli_error($connect);

                 }

}
        
?>
