<?php


include_once '../Database.php';

include_once '../classes/exam.php';







if (isset($_POST['add_exam'])) {

    echo $exam_info["topic"] = $_POST['topic'];
    echo $exam_info["course_id"] = $_POST['course_id'];
    echo $exam_info["marks_per_qn"] = $_POST['marks_per_question'];
    echo $exam_info["total_questions"] = $_POST['total_question'];










    $a = new exam();
    if ($a->addExam($exam_info)) {
        $_SESSION['message'] = "exam added successfully!";
        header("Location:../teacher-exam-list.php");
    } else {
        $_SESSION['message'] = "Course  could not be added!";

        header("Location:../teacher-exam-list.php");
    }
}