<?php include_once 'admin-navbar.php';
include_once 'Database.php';
include_once 'classes/exam.php';

$exam = new exam();

$exam_list = $exam->viewAllExams();





?>


<div class="bg-container">
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Exam list </h2>
                        </div>

                    </div>
                </div>
                <?php if (count($exam_list) > 0) {
                    $i = 0; ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="exam-row">

                            <th>S.No.</th>
                            <th>Topic</th>

                            <th>Course</th>
                            <th>Total Questions</th>
                            <th>Total marks</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($exam_list as $exam) {


                            ?>
                        <tr>


                            <td><?php echo $i + 1; ?></td>
                            <?php $i++; ?>
                            <td><?php echo $exam['topic']; ?></td>
                            <td><?php echo $exam['course_title']; ?></td>
                            <td><?php echo $exam['total_questions']; ?></td>
                            <td><?php echo $exam['total_questions'] * $exam['marks_per_qn']; ?></td>




                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>