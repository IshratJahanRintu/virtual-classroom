<?php

include_once '../Database.php';

$db = Database::getInstance();

if (isset($_POST['question'])) {
    $question = $_POST['question'];
    $i = 0;
    while ($i < count($_POST['question'])) {
        $question_info['question'] = $question[$i];
        $question_info['option1'] = $question[$i + 1];
        $question_info['option2'] = $question[$i + 2];
        $question_info['option3'] = $question[$i + 3];
        $question_info['option4'] = $question[$i + 4];
        $question_info['ans'] = $question[$i + 5];
        $question_info['exam_id'] = $question[$i + 6];


        $db->insert("question", $question_info);

        $i = $i + 7;
    }
    header("location:../teacher-exam-list.php");
} else {
    header("location:../loginpage.php");
}