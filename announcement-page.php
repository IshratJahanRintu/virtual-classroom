<?php
session_start();

include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/notice.php';

if (isset($_SESSION['course_id'])) {
    $course_id = $_SESSION['course_id'];
    $course_info['course_id'] = $course_id;

    $notice = new notice();
    $notice_list = $notice->viewSpecificCourseNotices($course_info);


?>
    <div class="course-whole-container">
        <nav class="course-navbar">
            <ul>
                <li><a href="teacher-view-course.php?course_id=<?php echo $course_id; ?>">summary </a> </li>
                <li class="active-list"><a href="announcement-page.php">Announcement</a></li>
                <li><a href="teacher-course-materials.php"> Course Materials</a></li>
                <li>Assignments</li>
                <li>Students</li>
                <li>Exams</li>
            </ul>
        </nav>
        <div class="course-main-content">
            <div class=" notice-header">Announcement
                <div class="notice-btn-container">
                    <button class="notice-btn" data-toggle="modal" data-target="#addNoticeModal">Add Announcement</button>
                </div>
            </div>

            <!-- add announcement modal -->
            <div class="modal fade" id="addNoticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Announcement</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">



                            <div class="md-form">
                                <form action="handlers/addAnouncementHandler.php" method="post">
                                    <i class="fas fa-pencil prefix grey-text"></i>
                                    <input type="hidden" name="course_id" value="<?php echo $course_id ?>">
                                    <textarea type=" text" id="form8" class="md-textarea form-control" rows="6" name="notice">
                        </textarea>
                                    <label data-error="wrong" data-success="right" for="form8">Write the announcement</label>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="submit" class="btn btn-unique" value="Create" name="add_notice"></form>
                            <button class="btn btn-danger" data-dismiss="modal" value="">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (count($notice_list) > 0) {

                foreach ($notice_list as $n) {
            ?>

                    <div class="notice-card">
                        <div class="notice-card-left"><?= $n['notice_desc'] ?> </div>
                        <div class="notice-card-right">
                            <a href="#editNoticeModal" data-toggle="modal" data-notice="<?php echo $n['notice_desc'] ?>" data-noticeid="<?php echo $n['notice_id'] ?>"><i class="zmdi zmdi-edit"></i></a>

                            <a href="#deleteNoticeModal" data-toggle="modal" data-noticeid="<?php echo $n['notice_id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                        </div>

                        <div class="sub-txt">time</div>
                    </div>

                    <!-- Edit Modal HTML -->
                    <div class="modal fade" id="editNoticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Announcement</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">

                                    <div class="md-form">
                                        <form action="handlers/editAnnouncementHandler.php" method="post">
                                            <i class="fas fa-pencil prefix grey-text"></i>

                                            <input type="text" id="form8" class="md-textarea form-control" rows="10" name="notice" value="">
                                            <input type="hidden" name="notice_id" value="">

                                            <label data-error="wrong" data-success="right" for="form8">Edit announcement</label>

                                    </div>

                                </div>
                                <div class="modal-footer d-flex justify-content-center">

                                    <input type="submit" class="btn btn-unique" value="Update" name="edit_notice"></form>
                                    <button class="btn btn-danger" data-dismiss="modal" value="">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- delete modal -->
                    <div id="deleteNoticeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="handlers/deleteNoticeHandler.php" method="get">
                                    <div class="modal-header">

                                        <h4 class="modal-title">Remove Student</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this course?</p>
                                        <p class="text-warning">
                                            This action cannot be undone.
                                        </p>
                                    </div>
                                    <div class="modal-footer">

                                        <input type="hidden" name="notice_id" value="">
                                        <input type="submit" name="delete_notice" class="btn btn-danger" value="Delete">
                                        <input type="button" class="btn" style="border: 1px solid black; color:black; " data-dismiss="modal" value="Cancel">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


            <?php
                }
            } else {
                echo "<h1>No announcement</h1>";
            }
            ?>

        </div>
    </div>

<?php
}

include 'footer.php' ?>