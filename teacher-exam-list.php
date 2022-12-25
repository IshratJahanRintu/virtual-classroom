<?php
session_start();
if (isset($_SESSION)) {
    if ($_SESSION['user_type'] != 'teacher') {
        header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php");
}

include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/course.php';
include_once 'classes/exam.php';
$course = new course();
$exam = new exam();
$teacher_info['teacher_id'] = $_SESSION['user_id'];
$course_list = $course->viewSpecificTeacherCourses($teacher_info);



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
                    <h3><?= $x['date']; ?></h3>
                    <span>Starting Time:<?= $x['start']; ?></span>
                </div>
            </div>
            <div class="thumb">
                <i class="ion ion-ios-paper-outline"
                   style="font-size: 8rem; color: white; text-align: center"
                   aria-hidden="true"></i>

                <span><?= $x['total_questions'] * $x['marks_per_qn']; ?> Markrs</span>
            </div>
            <h3 class="title"><?= $x['topic']; ?></h3>
            <a href="add-question-page.php?exam_id=<?= $x['exam_id']; ?>&total_question=<?= $x['total_questions']; ?>"
               class="btn"><i style="font-size: 18px;"
                   class="material-icons">&#xE147;</i> <span style="font-size: 19px;">Add Question
                </span></a>
        </div>

        <?php } ?>
        <div class="box">
            <div class="tutor">
                <div class="info">
                    <h3>Add Exam</h3>

                </div>
            </div>
            <div style=" background-color:transparent; border:2px solid #024368;box-shadow:none; height:25.5rem;"
                 class="thumb">
                <a href="#addExamModal"
                   data-toggle="modal"
                   data-courseid="<?php echo $c['course_id']; ?>">

                    <i class="zmdi zmdi-plus-square"
                       style="font-size: 10rem;  text-align: center;cursor:pointer;color:#024368"
                       title="Add Exam"></i> </a>

            </div>

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
                                <input type="time"
                                       name="start"
                                       placeholder="Start time"
                                       class="form-control"
                                       required>

                            </div>
                            <div class="form-wrapper">
                                <input type="time"
                                       name="end"
                                       placeholder="Start time"
                                       class="form-control"
                                       required>

                            </div>
                            <div class="form-wrapper">
                                <input type="date"
                                       name="date"
                                       value="<?= date('Y-m-d'); ?>"
                                       min="<?= date('Y-m-d'); ?>"
                                       placeholder="Exam date"
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