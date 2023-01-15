<?php

include_once 'student-navbar.php';

include_once 'Database.php';
include_once 'classes/exam.php';

include_once 'student-navbar.php';

if (isset($_GET['exam_id'])) {

    $exam_id = $_GET['exam_id'];
    $exam = new exam();
    $exam_topic = $exam->examTopic($exam_id);
    $question_list = $exam->viewSpecificExamQuestions($exam_id);
}
?>
<div class="bg-container">
    <div class="container-md">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <h2><b><?php echo $exam_topic; ?></b></h2>
                </div>
                <?php if (count($question_list) > 0) { ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>Question</th>
                            <th>answer</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($question_list as $q) {
                                $op = "option" . $q['ans'];
                            ?>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox"
                                           name="options[]"
                                           value="1">

                                </span>
                            </td>

                            <td><?php echo $q['question']; ?></td>
                            <td><?php echo $q["$op"]; ?></td>



                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>

            </div>
        </div>
    </div>



</div>