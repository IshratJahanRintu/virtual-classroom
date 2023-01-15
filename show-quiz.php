<?php

include_once 'student-navbar.php';

include_once 'Database.php';
include_once 'classes/exam.php';

include_once 'student-navbar.php';

if (isset($_GET['exam_id'])) {

    $exam_id = $_GET['exam_id'];
    $exam = new exam();
    $question_list = $exam->viewSpecificExamQuestions($exam_id);
}
?>




<div class="container-md">

    <div class="col-sm-8">
        <h1 class="heading">QUIZ</h1>



        <form method="post"
              id="form1"
              action="answer.php">
            <?php
            $i = 1;
            foreach ($question_list as $ques) { ?>

            <table style="margin:30px auto;"
                   class=" table table-bordered border-dark">
                <thead>
                    <tr class="info">
                        <th><?php echo "Question " . $i . ". "; ?><?php echo $ques['question']; ?> </th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><input type="radio"
                                   value="1"
                                   name="<?php echo $ques['question_id']; ?>"><label><?php echo $ques['option1']; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="radio"
                                   value="2"
                                   name="<?php echo $ques['question_id']; ?>"><label
                                   for=""><?php echo $ques['option2']; ?></label>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="radio"
                                   value="3"
                                   name="<?php echo $ques['question_id']; ?>"><label><?php echo $ques['option3']; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="option"><input type="radio"
                                       id="option4"
                                       value="4"
                                       name="<?php echo $ques['question_id']; ?>"><label><?php echo $ques['option4']; ?></label>
                            </div>
                        </td>
                    </tr>






                    <input type="hidden"
                           value="<?php echo $exam_id; ?>"
                           name="exam_id">

                </tbody>
            </table>
            <?php

                $i++;
            } ?>
            <center><input type="submit"
                       value="submit"
                       class="notice-btn"
                       name="answer" /></center>
        </form>
    </div>
    <div class="col-sm-2"></div>

</div>
<?php
include_once 'footer.php';

?>