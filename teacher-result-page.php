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
        echo "<h1 class='empty'>No result found</h1>";
    }
} else {
    header("location:loginpage.php");
}

include_once 'footer.php'; ?>