<?php
session_start();
if (isset($_SESSION)) {
    if ($_SESSION['user_type'] != 'student') {
        header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php");
}

include_once 'student-navbar.php';
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
$exam_ifo['student_id'] = $_SESSION['user_id'];


if (count($course_list) > 0) {



?>

<section class="courses">


    <?php foreach ($course_list as $c) { ?>
    <h1 class="heading"><?php echo $c['course_title'] ?></h1>




    <div class="box-container">

        <?php $course_exams = $exam->viewSpecificCourseExams($c);
                foreach ($course_exams as $x) {
                    if ($exam->questionExist($x["exam_id"])) {
                        $exam_ifo['exam_id'] = $x["exam_id"];
                ?>

        <div class="box">
            <div class="tutor">

                <div class="info">


                </div>
            </div>
            <div class="thumb">
                <a href="show-quiz.php?exam_id=<?= $x['exam_id']; ?>">
                    <i class="ion ion-ios-paper-outline"
                       style="font-size: 7rem; color: white; text-align: center"
                       aria-hidden="true"></i>
                </a>

                <span
                      style="top: 0.5rem; position: absolute; left: auto;right: 0.5rem;background-color: transparent;font-size: 1.5rem;"><?= $x['total_questions'] * $x['marks_per_qn']; ?>
                    Markrs</span>
            </div>
            <h3 class="title"><?= $x['topic']; ?></h3>
            <?php if (!$exam->examTaken($exam_ifo)) {
                            ?>
            <a href="show-quiz.php?exam_id=<?= $x['exam_id']; ?>"
               class="notice-btn btn-info"> <span style="font-size: 16px;">Start
                </span></a>
            <?php } else {
                            ?>
            <a href="student-result-page.php?exam_id=<?= $x['exam_id']; ?>"
               class="notice-btn btn-info"> <span style="font-size: 16px;">See result
                </span></a>
            <a href="#"
               class="notice-btn btn-info "> <span style="font-size: 16px;">See answers
                </span></a>
            <?php  } ?>

        </div>

        <?php }
                } ?>



    </div>


    </div>
    <?php } ?>
</section>
<?php
} else {
    echo "<h1>No records to show</h1>";
}

include_once 'footer.php' ?>