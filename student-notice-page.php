<?php
session_start();

include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/notice.php';
include_once 'classes/course.php';

if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];
    $course_info['course_id'] = $course_id;
    $c = new course();
    $course_title = $c->getCourseInfo("course_title", $course_id);
    $notice = new notice();
    $notice_list = $notice->viewSpecificCourseNotices($course_info);


?>
<div class="course-whole-container">
    <nav class="course-navbar">
        <ul>
            <div class="course-heading"><?= $course_title ?></div>
            <li><a href="student-view-course.php?course_id=<?php echo $course_id; ?>">summary </a> </li>
            <li class="active-list"><a href="#">Announcement</a></li>
            <li><a href="student-course-materials.php"> Course Materials</a></li>
            <li>Assignments</li>

            <li><a href="student-exam-list.php?course_id=<?php echo $course_id; ?>">Exams</a></li>
        </ul>
    </nav>
    <div class="course-main-content">
        <div class=" notice-header">Announcement

        </div>



        <?php if (count($notice_list) > 0) {

                foreach ($notice_list as $n) {
            ?>

        <div class="notice-card">
            <div class="notice-card-left"><?= $n['notice_desc'] ?> </div>
            <div class="notice-card-right">
                <div class="sub-txt"><?php echo date('Y,F,jS', strtotime($n['time'])); ?></div>
            </div>


        </div>



        <?php
                }
            } else {
                echo "<h1 class='empty'>No announcement</h1>";
            }
            ?>

    </div>
</div>

<?php
}

include 'footer.php' ?>