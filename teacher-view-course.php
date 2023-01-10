<?php include_once 'teacher-navbar.php';
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
} ?>

<nav class="course-navbar">
    <ul>
        <li style="background-color: #452c63; color:white"><a
               href="teacher-view-course.php?course_id=<?php echo $course_id; ?>">summary </a> </li>
        <li><a href="announcement-page.php?course_id=<?php echo $course_id; ?>">Announcement</a></li>
        <li>Course Materials</li>
        <li>Assignments</li>
        <li>Students</li>
        <li>Exams</li>
    </ul>
</nav>