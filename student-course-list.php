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
$user = new user("student");
$u = $user->getIndividual($_SESSION['user_id']);
$course = new course();
$exam = new exam();


$course_list = $course->viewSpecificSemesterCourses($u);







?>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">


                <h2>Your <b>Courses</b></h2>





            </div>
            <?php if (count($course_list) > 0) {
                foreach ($course_list as $c) { ?>

                    <div class="course-list">
                        <div class="course-name"><?= $c['course_title'] ?></div>
                        <div class="view-course"><a href="student-view-course.php?course_id=<?php echo $c['course_id'] ?>"><i class="zmdi zmdi-open-in-new "></i></a>
                        </div>
                    </div>
            <?php }
            } else {
                echo "<h1 class='empty'>You Currently have no course Enrolled</h1>";
            } ?>
        </div>
    </div>
</div>
<?php
// } else {
//     echo "<h1>No records to show</h1>";
// }

include_once 'footer.php' ?>