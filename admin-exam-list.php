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
                        <tr>

                            <th>S.No.</th>
                            <th>Topic</th>

                            <th>Course</th>
                            <th>Total Questions</th>
                            <th>Total marks</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($exam_list as $exam) {


                            ?>
                        <tr <?php if ($exam['status'] == 'Running') {
                                        echo 'class="Running"';
                                    } elseif ($exam['status'] == 'upcoming') {
                                        echo 'class="upcoming"';
                                    } elseif ($exam['status'] == 'completed') {
                                        echo 'class="completed"';
                                    }

                                    ?>>


                            <td><?php echo $i + 1; ?></td>
                            <?php $i++; ?>
                            <td><?php echo $exam['topic']; ?></td>
                            <td><?php echo $exam['course_title']; ?></td>
                            <td><?php echo $exam['total_questions']; ?></td>
                            <td><?php echo $exam['total_questions'] * $exam['marks_per_qn']; ?></td>
                            <td><?php echo $exam['status']; ?></td>



                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#"
                               class="page-link">1</a></li>
                        <li class="page-item"><a href="#"
                               class="page-link">2</a></li>
                        <li class="page-item active"><a href="#"
                               class="page-link">3</a></li>
                        <li class="page-item"><a href="#"
                               class="page-link">4</a></li>
                        <li class="page-item"><a href="#"
                               class="page-link">5</a></li>
                        <li class="page-item"><a href="#"
                               class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>