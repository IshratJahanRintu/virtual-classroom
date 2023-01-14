<?php
session_start();
include_once 'Database.php';
include_once 'classes/course.php';
include_once 'classes/content.php';
include_once 'classes/exam.php';
include_once 'classes/notice.php';
$c = new course();
$content = new content();
$exam = new exam();
$notice = new notice();
include_once 'student-navbar.php';
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $_SESSION['course_id'] = $_GET['course_id'];
} elseif (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];
    $course_title = $c->getCourseInfo("course_title", $course_id);
} else {
    header("location:student-course-list.php");
}
$course_title = $c->getCourseInfo("course_title", $course_id);
$content_info['course_id'] = $course_id;
$total_videos = count($content->viewSpecificCourseVideos($content_info));
$total_documents = count($content->viewSpecificCourseDocuments($content_info));
$total_slides = count($content->viewSpecificCourseSlides($content_info));
$total_exams = count($exam->viewSpecificCourseExams($content_info));
$total_notice = count($notice->viewSpecificCourseNotices($content_info));

?>

<div class="course-whole-container">
    <nav class="course-navbar">
        <ul>
            <div class="course-heading"><?= $course_title ?></div>
            <li class="active-list"><a href="#">summary </a> </li>
            <li><a href="student-notice-page.php">Announcement</a></li>
            <li><a href="student-course-materials.php"> Course Materials</a></li>
            <li>Assignments</li>

            <li><a href="student-exam-list.php?course_id=<?= $course_id ?>">Exams</a></li>
        </ul>
    </nav>
    <div class="course-main-content">
        <section class="playlist-videos">


            <div class="box-container">




                <div class="box">
                    <span><?= $total_exams ?></span>
                    <img src="images/exam.png"
                         alt="" />
                    <h3 class="total">Total Exams</h3>

                </div>
                <div class="box">
                    <span><?= $total_notice ?></span>
                    <img src="images/notice.jpg"
                         alt="" />
                    <h3 class="total">Total Announcements</h3>

                </div>
                <div class="box">
                    <span><?= $total_videos ?></span>
                    <img src="images/video.png"
                         alt="" />
                    <h3 class="total">Total videos</h3>

                </div>
                <div class="box">
                    <span><?= $total_documents ?></span>
                    <img src="images/doc.png"
                         alt="" />
                    <h3 class="total">Total Documents</h3>

                </div>
                <div class="box">
                    <span><?= $total_slides ?></span>
                    <img src="images/ppt.jpg"
                         alt="" />
                    <h3 class="total">Total slides</h3>

                </div>









            </div>




        </section>
    </div>

</div>