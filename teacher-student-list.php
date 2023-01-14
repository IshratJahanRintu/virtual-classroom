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

$course = new course();

$teacher_info['teacher_id'] = $_SESSION['user_id'];
$course_list = $course->viewSpecificTeacherCourses($teacher_info);



if (count($course_list) > 0) {



?>

    <section class="courses">


        <?php foreach ($course_list as $c) {
            $student_list = $course->viewCourseStudents($c['course_id']);

        ?>
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <h2><b><?php echo $c['course_title'] . "  [Semester-" . $c['semester'] . "]"; ?></b></h2>
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
                                                <input type="checkbox" name="options[]" value="1">

                                            </span>
                                        </td>
                                        <td><?php echo $student['name']; ?></td>
                                        <td><?php echo $student['email']; ?></td>
                                        <td><?php echo $student['contact_no']; ?></td>


                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else echo "<center>No Students</center>" ?>

                </div>
            </div>


        <?php }
        ?>


    </section>
<?php } else {
    echo "<h1 class='heading'>No Students </h1>";
} ?>