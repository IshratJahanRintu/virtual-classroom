<?php
// session_start();
// if (isset($_SESSION)) {
//     if ($_SESSION['user_type'] != 'teacher') {
//         header("location:loginpage.php");
//     }
// } else {
//     header("location:loginpage.php");
// }

include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/course.php';
include_once 'classes/exam.php';
// $course = new course();
// $exam = new exam();
// $teacher_info['teacher_id'] = $_SESSION['user_id'];
// $course_list = $course->viewSpecificTeacherCourses($teacher_info);



// if (count($course_list) > 0) {



?>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Your <b>Courses</b></h2>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>
<?php
// } else {
//     echo "<h1>No records to show</h1>";
// }

include_once 'footer.php' ?>