<?php
session_start();
if (isset($_SESSION)) {
    if ($_SESSION['user_type'] != 'student') {
        header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php");
}

include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/course.php';
include_once 'classes/exam.php';
include_once 'classes/user.php';
$course = new course();
$exam = new exam();
$student = new user("student");
$student_info['user_id'] = $_SESSION['user_id'];
$student_info['semester'] = $student->viewSemester($student_info);
$course_list = $course->viewSpecificSemesterCourses($student_info);



if (count($course_list) > 0) {



?>

<section class="courses">


    <?php foreach ($course_list as $c) { ?>
    <h1 class="heading"><?php echo $c['course_title'] ?></h1>




    <div class="box-container">

        <?php $course_exams = $exam->viewSpecificCourseExams($c);
                foreach ($course_exams as $x) { ?>

        <div class="box">
            <div class="tutor">

                <div class="info">
                    <h3><?php echo date('jS,F,Y', strtotime($x['start'])); ?></h3>
                    <span>Time:
                        <?php echo date(' g:i A', strtotime($x['start'])); ?>
                    </span>

                </div>
            </div>
            <div class="thumb">
                <i class="ion ion-ios-paper-outline"
                   style="font-size: 7rem; color: white; text-align: center"
                   aria-hidden="true"></i>

                <span> <a href="#"><i title="Edit Exam"
                           class=" zmdi zmdi-border-color"></i></a> <a href="#"><i title="Delete Exam"
                           style="color: red;
    margin-left: 6px;
    font-size: 18px;"
                           class="zmdi zmdi-delete"></i></a></span>
                <span style="top: 0.5rem;
  position: absolute;
  left: auto;
  right: 0.5rem;

  background-color: transparent;
  font-size: 1.5rem;"><?= $x['total_questions'] * $x['marks_per_qn']; ?> Markrs</span>
            </div>
            <h3 class="title"><?= $x['topic']; ?></h3>
            <?php if ($exam->questionExist($x['exam_id']) > 0) {
                        ?>
            <a href="#"
               class="option-btn"><i class="zmdi zmdi-edit"
                   style="font-size: 18px;"></i> <span style="font-size: 16px;">Edit Question
                </span></a>
            <?php } else {
                        ?>
            <a href="add-question-page.php?exam_id=<?= $x['exam_id']; ?>&total_question=<?= $x['total_questions']; ?>"
               class="btn"><i style="font-size: 18px; margin-right:4px"
                   class="material-icons">&#xE147;</i> <span style="font-size: 16px;">Add Question
                </span></a>
            <?php  } ?>
        </div>

        <?php } ?>



    </div>
    <div id="addExamModal"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="access-form"
                      action="handlers/addExamHandler.php"
                      method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Exam information</h4>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrapper">
                            <input type="text"
                                   name="topic"
                                   placeholder="Topic"
                                   class="form-control"
                                   required>
                            <i class="zmdi zmdi-assignment-o"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="number"
                                   name="marks_per_question"
                                   placeholder="Marks per Question"
                                   class="form-control"
                                   required>
                            <i class="zmdi zmdi-collection-item-1"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="number"
                                   name="total_question"
                                   placeholder="Total Questions"
                                   class="form-control"
                                   required>
                            <i class="zmdi zmdi-collection-item"></i>
                        </div>
                        <div class="form-wrapper">
                            <p><label>Enter Starting Time</label></p>
                            <input type="datetime-local"
                                   name="start"
                                   placeholder="Start time"
                                   class="form-control"
                                   required>

                        </div>
                        <div class="form-wrapper">
                            <p><label>Enter Ending Time</label></p>
                            <input type="datetime-local"
                                   name="end"
                                   placeholder="Start time"
                                   class="form-control"
                                   required>

                        </div>

                        <input type="hidden"
                               value=""
                               name="course_id">


                    </div>

                    <div class="modal-footer">

                        <input type="submit"
                               class="btn btn-success"
                               name="add_exam"
                               value="Add">
                        <input type="button"
                               class="option-btn"
                               data-dismiss="modal"
                               value="Cancel">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <?php } ?>
</section>
<?php
} else {
    echo "<h1>No records to show</h1>";
}

include_once 'footer.php' ?>