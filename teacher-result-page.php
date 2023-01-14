<?php
session_start();
include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/exam.php';
include_once 'classes/course.php';
$course = new course();
$exam = new exam();
if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "teacher") {

    if (isset($_GET['exam_id'])) {
        $info['exam_id'] = $_GET['exam_id'];

        $exam_id = $info['exam_id'];
        $table_title = $exam->examTopic($exam_id) . "Exam Results";
        $result_list = $exam->specificExamResult($exam_id);
    } else if (isset($_GET['course_id'])) {
?>
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

<?php
    } else {
        header("location:teacher-course-list.php");
    }
    ?>



<h1 class="heading"><?php echo $table_title; ?></h1>
<?php if (count($result_list) > 0) { ?>
<table id="resultTable"
       class="table table-striped"
       style="width:80%;margin:15px auto;border: 1px solid grey;">
    <thead>


        <tr>

            <th>Total mark</th>
            <th>Your mark</th>
            <th>Percentage</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result_list as  $r) {
                    # code...
                ?>
        <tr>

            <td><?= $r['total_mark'] ?></td>
            <td><?= $r['achieved_mark'] ?></td>
            <th><?= ($r['achieved_mark'] * 100) / $r['total_mark'] . " % "; ?></th>

        </tr>
        <?php } ?>


    </tbody>
</table>







<?php
    } else {
        echo "<h1>No result found</h1>";
    }
} else {
    header("location:loginpage.php");
}

include_once 'footer.php'; ?>