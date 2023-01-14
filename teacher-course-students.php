<?php
session_start();

include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/course.php';

$course_id = $_SESSION['course_id'];
$c = new course();
$course_title = $c->getCourseInfo("course_title", $course_id);
$course_semester
    = $c->getCourseInfo("semester", $course_id);
$student_list = $c->viewCourseStudents($course_id);
?>
<div class="course-whole-container">
    <nav class="course-navbar">
        <ul>
            <div class="course-heading"><?= $course_title ?></div>
            <li><a href="teacher-view-course.php">summary </a> </li>
            <li><a href="announcement-page.php">Announcement</a></li>
            <li><a href="teacher-course-materials.php"> Course Materials</a></li>
            <li>Assignments</li>
            <li class="active-list">Students</li>
            <li><a href="teacher-course-exams.php"> Exams</a></li>
        </ul>
    </nav>


    <div class="bg-container">
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2><b><?php echo "Students" . "  [Semester-" . $course_semester . "]"; ?></b></h2>
                    </div>
                    <?php if (count($student_list) > 0) { ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>

                                </th>
                                <th>Name</th>
                                <th>Email</th>

                                <th>Phone</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($student_list as $student) {
                                ?>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox"
                                               name="options[]"
                                               value="1">

                                    </span>
                                </td>
                                <td><?php echo $student['name']; ?></td>
                                <td><?php echo $student['email']; ?></td>
                                <td><?php echo $student['contact_no']; ?></td>


                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>

                </div>
            </div>
        </div>



    </div>
</div>