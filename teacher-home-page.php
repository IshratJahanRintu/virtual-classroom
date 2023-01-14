<?php
session_start();
include_once 'Database.php';
include_once 'classes/course.php';
include_once 'classes/exam.php';
include_once 'classes/content.php';
include_once 'classes/notice.php';
include_once 'classes/user.php';

if (isset($_SESSION)) {
    if ($_SESSION['user_type'] == 'teacher') {
        include_once 'teacher-navbar.php';
        $course = new course();
        $exam = new exam();
        $content = new content();
        $notice = new notice();
        $user = new user("teacher");
        $u = $user->getIndivudual($_SESSION['user_id']);
        $userName = $u['name'];
        $total_students = 0;
        $total_exams = 0;
        $total_notice = 0;
        $total_videos = 0;
        $total_documents = 0;
        $total_slides = 0;

        $teacher_info['teacher_id'] = $_SESSION['user_id'];
        $course_list = $course->viewSpecificTeacherCourses($teacher_info);
        $total_course = count($course_list);

        if (count($course_list) > 0) {
            foreach ($course_list as $c) {



                $student_list = $course->viewCourseStudents($c['course_id']);
                $course_exams = $exam->viewSpecificCourseExams($c);
                $notice_list = $notice->viewSpecificCourseNotices($c);
                $video_list = $content->viewSpecificCourseVideos($c);
                $document_list = $content->viewSpecificCourseDocuments($c);
                $slide_list = $content->viewSpecificCourseSlides($c);
                $total_videos += count($video_list);
                $total_documents += count($document_list);
                $total_slides += count($slide_list);
                $total_notice += count($notice_list);
                $total_exams += count($course_exams);
                $total_students += count($student_list);
            }
        }

?>

<div class="course-whole-container">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light"
         style="width: 280px;    width: 180px;
    position: sticky;
    top: 15%;
    height: 100vh;">
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="images/profile.png"
                 width="80"
                 height="65">



        </div>
        <span class="fs-2"
              style="font-size: 18px;color:#1e0437"><?= $userName ?></span>
        <p><?= $u['designation']; ?></p>

        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <div style="font-size:15px;"
                     class="">
                    <i class="zmdi zmdi-phone"></i>

                    <?= $u['contact_no']; ?>
                </div>
                <div style="font-size: 11px;
    margin-top: 15px;"
                     class="">
                    <i class="zmdi zmdi-email"></i>

                    <?= $u['email']; ?>
                </div>
            </li>


        </ul>
        <hr>

    </div>
    <div class="course-main-content">

        <section class="playlist-videos">
            <h1 class="heading">Activities</h1>

            <div class="box-container">
                <div class="box">
                    <span><?= $total_course ?></span>
                    <img src="images/course.png"
                         alt="" />
                    <h3 class="total">Total Courses</h3>

                </div>
                <div class="box">
                    <span><?= $total_students ?></span>
                    <img src="images/student.png"
                         alt="" />
                    <h3 class="total">Total Students</h3>

                </div>
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
<?php
    }
}
?>