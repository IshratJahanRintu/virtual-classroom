<?php include_once 'teacher-navbar.php';
include_once 'Database.php';
include_once 'classes/notice.php';
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $course_info['course_id'] = $_GET['course_id'];
}
$notice = new notice();
$notice_list = $notice->viewSpecificCourseNotices($course_info);


?>

<nav class="course-navbar">
    <ul>
        <li><a href="teacher-view-course.php?course_id=<?php echo $course_id; ?>">summary </a> </li>
        <li style=" background-color: #452c63; color:white"><a
               href="announcement-page.php?course_id=<?php echo $course_id; ?>">Announcement</a></li>
        <li>Course Materials</li>
        <li>Assignments</li>
        <li>Students</li>
        <li>Exams</li>
    </ul>
</nav>
<div class=" notice-header">Announcement
    <div class="notice-btn-container">
        <button class="notice-btn"
                data-toggle="modal"
                data-target="#addNoticeModal">Add notice</button>
    </div>
</div>

<!-- add announcement modal -->
<div class="modal fade"
     id="addNoticeModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog"
         role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Announcement</h4>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">



                <div class="md-form">
                    <form action="handlers/addAnouncementHandler.php"
                          method="post">
                        <i class="fas fa-pencil prefix grey-text"></i>
                        <input type="hidden"
                               name="course_id"
                               value="<?php echo $course_id ?>">
                        <textarea type=" text"
                                  id="form8"
                                  class="md-textarea form-control"
                                  rows="6"
                                  name="notice">
                        </textarea>
                        <label data-error="wrong"
                               data-success="right"
                               for="form8">Write the announcement</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <input type="submit"
                       class="btn btn-unique"
                       value="Create"
                       name="add_notice"></form>
                <button class="btn btn-danger"
                        data-dismiss="modal"
                        value="">Cancel</button>
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

        <i class="zmdi zmdi-edit"></i>
        <i class="zmdi zmdi-delete"></i>
    </div>

    <div class="sub-txt">time</div>
</div>

<?php
    }
} else {
    echo "<h1>No announcement</h1>";
}
include 'footer.php' ?>