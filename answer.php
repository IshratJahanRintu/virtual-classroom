<?php
session_start();
if (isset($_SESSION['user_id'])) {
  include_once 'Database.php';
  include_once 'classes/exam.php';
  if (isset($_POST['answer'])) {

    echo $exam_id = $_POST['exam_id'];
    $exam = new exam();
    $mark_per_qn =  $exam->examMark($exam_id);
    $course_id = $exam->examCourse($exam_id);
    $question_list = $exam->viewSpecificExamQuestions($exam_id);
    $correct = 0;

    $i = 0;
    foreach ($question_list as  $q) {
      if ($q['ans'] == $_POST[$q['question_id']]) {
        $correct++;
      }
      $i++;
      # code...
    }
    $history['total_mark'] = $mark_per_qn * $i;
    $history['achieved_mark'] = $correct * $mark_per_qn;
    $history['exam_id'] = $exam_id;
    $history['course_id'] = $course_id;
    $history['student_id'] = $_SESSION['user_id'];

    if ($exam->addHistory($history)) {
      echo "history inserted";
    }
  }
}