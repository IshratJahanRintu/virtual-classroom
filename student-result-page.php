<?php
session_start();
include_once 'student-navbar.php';
include_once 'Database.php';
include_once 'classes/exam.php';
include_once 'classes/course.php';
$course = new course();
$exam = new exam();
if (isset($_SESSION['user_id']) && $_SESSION['user_type'] == "student") {
    $info['student_id'] = $_SESSION['user_id'];
    if (isset($_GET['exam_id'])) {
        $info['exam_id'] = $_GET['exam_id'];

        $exam_id = $info['exam_id'];
        $result_list = $exam->scificExamSingleResult($info);
    } else {
        $result_list = $exam->specificStudentResult($info);
    }
?>



<h1 class="heading">Your Result</h1>
<?php if (count($result_list) > 0) {
    ?>
<table id="resultTable"
       class="table table-striped"
       style="width:80%;margin:15px auto;border: 1px solid grey;">
    <thead>


        <tr>
            <th>Exam</th>
            <th>Course</th>
            <th>Total mark</th>
            <th>Achieved mark</th>
            <th>Percentage</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($result_list as  $r) {
                    $exam_topic = $exam->examTopic($r['exam_id']);
                    $c = $course->getIndividual($r['course_id']);  # code...
                ?>
        <tr>
            <td><?= $exam_topic ?></td>
            <td><?= $c['course_title'] ?></td>
            <td><?= $r['total_mark'] ?></td>
            <td><?= $r['achieved_mark'] ?></td>
            <th><?= ($r['achieved_mark'] * 100) / $r['total_mark'] . " % "; ?></th>

        </tr>
        <?php } ?>


    </tbody>
</table>







<?php
    } else {
        echo "<h1>You have not taken any exam yet</h1>";
    }
} else {
    header("location:loginpage.php");
}

include_once 'footer.php'; ?>