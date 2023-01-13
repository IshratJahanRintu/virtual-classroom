<?php
include_once 'Database.php';
include_once 'classes/exam.php';
if (isset($_POST['answer'])) {

    $exam_id = $_POST['exam_id'];
    $exam = new exam();
    $question_list = $exam->viewSpecificExamQuestions($exam_id);
    $correct=0;
    $wrong=0;
    $none=0;
    foreach ($question_list as  $q) {
      if($q['ans']==$_POST[$q['question_id']]){
        $correct++

      }
      elseif ($_POST[$q['question_id']]==0) {
        $none++;
        # code...
      }
      else{$wrong++;}

        # code...
    }
}