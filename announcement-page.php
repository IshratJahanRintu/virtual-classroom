<?php include_once 'teacher-navbar.php' ?>

<nav class="course-navbar">
    <ul>
        <li><a href="teacher-view-course.php">summary </a> </li>
        <li style="background-color: #452c63; color:white"><a href="announcement-page.php">Announcement</a></li>
        <li>Course Materials</li>
        <li>Assignments</li>
        <li>Students</li>
        <li>Exams</li>
    </ul>
</nav>
<div class="notice-header">Announcement
    <div class="notice-btn-container">
        <button class="notice-btn"
                data-toggle="modal"
                data-target="#addNoticeModal">Add notice</button>
    </div>
</div>

<!-- add announcement modal -->
<div id="addNoticeModal"
     class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="access-form"
                  action="handlers/addNoticeHandler.php"
                  method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add Announcement</h4>
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">


                    <div class="form-wrapper">
                        <input type="text"
                               placeholder="What is the announcement about?"
                               name="notice-text"
                               class="form-control"
                               required>

                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button"
                           class="btn btn-danger"
                           data-dismiss="modal"
                           value="Cancel">
                    <input type="submit"
                           class="btn btn-success"
                           name="add_student"
                           value="create">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="notice-card">
    <div class="notice-card-left">notice content </div>
    <div class="notice-card-right">

        <i class="zmdi zmdi-edit"></i>
        <i class="zmdi zmdi-delete"></i>
    </div>

    <div class="sub-txt">time</div>
</div>