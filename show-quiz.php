<?php
// include("class/users.php");
// $qus = new users;
// $cat = $_POST['cat'];
// $qus->qus_show($cat);
// $_SESSION['cat'] = $cat;

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

<!-- <script>
        $(function() {
            $("#draggable").draggable();
        });
    </script>

    <script type="text/javascript">
        function timeout() {
            var minute = Math.floor(timeLeft / 60);
            var second = timeLeft % 60;
            if (timeLeft <= 0) {
                clearTimeout(tm);
                document.getElementById("form1").submit();
            } else {
                if (minute < 10) {
                    minute = "0" + minute;
                }
                if (second < 10) {
                    second = "0" + second;
                }
                document.getElementById("time").innerHTML = minute + ":" + second;
            }
            timeLeft--;
            var tm = setTimeout(function() {
                timeout()
            }, 1000);


        }

        //   $(document).ready(function() {

        //     $(document)[0].oncontextmenu = function() { return false; }

        //     $(document).mousedown(function(e) {
        //         if( e.button == 2 ) {
        //             alert('Sorry, this functionality is disabled!');
        //             return false;
        //         } else {
        //             return true;
        //         }
        //     });
        // });
    </script> -->



<div class="container">

    <div class="col-sm-8">
        <h2>QUIZ</h2>
        <!-- <script type="text/javascript">
                var timeLeft = 2 * 60;
            </script>

            <div id="draggable" class="ui-widget-content">
                <p>
                <div id="time" style="float:right">Time</div>
                <div style="float:right">Timeleft :</div>
                </p>
            </div> -->



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
                        <th><?php echo $i; ?><?php echo $ques['question']; ?> </th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?php echo $ques['option1']; ?><input type="radio"
                                   value="1"
                                   name="<?php echo $ques['question_id']; ?>" />
                        </td>
                    </tr>

                    <tr>
                        <td><input type="radio"
                                   value="2"
                                   name="<?php echo $ques['question_id']; ?>"><?php echo $ques['option2']; ?></input>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="radio"
                                   value="3"
                                   name="<?php echo $ques['question_id']; ?>" /><?php echo $ques['option3']; ?></td>
                    </tr>


                    <tr>
                        <td><input type="radio"
                                   value="4"
                                   name="<?php $ques['question_id']; ?>" /><?php echo $ques['option4']; ?></td>

                    </tr>


                    <input type="radio"
                           checked="checked"
                           style="display:none"
                           value="0"
                           name="<?php echo $ques['question_id']; ?>" />

                    <input type="hidden"
                           value="<?php echo $exam_id; ?> "
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