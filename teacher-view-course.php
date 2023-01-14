<?php
session_start();
include_once 'Database.php';
include_once 'classes/course.php';
$c = new course();
include_once 'teacher-navbar.php';
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $_SESSION['course_id'] = $_GET['course_id'];
    $course_title = $c->getCourseInfo("course_title", $course_id);
?>
<div class="course-whole-container">
    <nav class="course-navbar">
        <ul>
            <div class="course-heading"><?= $course_title ?></div>
            <li style="background-color: #452c63; color:white"><a href="teacher-view-course.php">summary </a> </li>
            <li><a href="announcement-page.php">Announcement</a></li>
            <li><a href="teacher-course-materials.php"> Course Materials</a></li>
            <li>Assignments</li>
            <li><a href="teacher-course-students.php">Students</li>
            <li>Exams</li>
        </ul>
    </nav>
</div>
<?php } ?>