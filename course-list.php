<?php include_once 'admin-navbar.php';
include_once 'Database.php';
include_once 'classes/course.php';
include_once 'classes/user.php';

$teachers = new user("teacher");

$teacher_list = $teachers->viewAllMembers();
$course = new course();

$course_list = $course->viewAllCourses();





?>


<div class="bg-container">
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Courses</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addCourseModal"
                               class="btn btn-success"
                               data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New
                                    Course</span></a>

                        </div>
                    </div>
                </div>
                <?php if (count($course_list) > 0) {
                    $i = 0; ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>

                            </th>
                            <th>S.No.</th>
                            <th>Course Title</th>

                            <th>Teacher</th>
                            <th>Semester</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($course_list as $course) {
                            ?>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox"
                                           name="options[]"
                                           value="1">

                                </span>
                            </td>

                            <td><?php echo $i + 1; ?></td>
                            <?php $i++; ?>
                            <td><?php echo $course['course_title']; ?></td>
                            <td><?php echo $course['name']; ?></td>
                            <td><?php echo $course['semester']; ?></td>
                            <td>
                                <a href="#editCourseModal"
                                   class="edit"
                                   data-toggle="modal"
                                   data-courseid="<?php echo $course['course_id'] ?>"
                                   data-title="<?php echo $course['course_title'] ?>"
                                   data-teachername="<?php echo $course['name'] ?>"
                                   data-semester="<?php echo $course['semester'] ?>"><i class="material-icons"
                                       data-toggle="tooltip"
                                       title="Edit">&#xE254;</i></a>
                                <a href="#deleteCourseModal"
                                   class="delete"
                                   data-toggle="modal"
                                   data-courseid="<?php echo $course['course_id'] ?>"><i class="material-icons"
                                       data-toggle="tooltip"
                                       title="Delete">&#xE872;</i></a>
                            </td>

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
    <!--add Modal HTML -->
    <div id="addCourseModal"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="access-form"
                      action="handlers/addCourseHandler.php"
                      method="post"
                      onsubmit="return validate_mbl_pass()">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Course</h4>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrapper">
                            <input type="text"
                                   name="course_title"
                                   placeholder="Course Title"
                                   class="form-control"
                                   required>
                            <i class="zmdi zmdi-book"></i>
                        </div>


                        <div class="form-wrapper">
                            <select name="semester"
                                    id=""
                                    class="form-control"
                                    required>
                                <option value=""
                                        disabled
                                        selected>Semester</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                            </select>
                            <i class="zmdi zmdi-caret-down"
                               style="font-size: 17px"></i>
                        </div>

                        <div class="form-wrapper">
                            <select name="teacher_id"
                                    id=""
                                    class="form-control"
                                    required>
                                <option value=""
                                        disabled
                                        selected>Teacher</option>

                                <?php if (count($teacher_list) > 0) {
                                    foreach ($teacher_list as $teacher) { ?>
                                <option value=<?php echo $teacher["user_id"]; ?>><?php echo $teacher["name"]; ?>
                                </option>
                                <?php }
                                } ?>
                            </select>
                            <i class="zmdi zmdi-caret-down"
                               style="font-size: 17px"></i>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="button"
                               class="btn btn-danger"
                               data-dismiss="modal"
                               value="Cancel">
                        <input type="submit"
                               class="btn btn-success"
                               name="add_course"
                               value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- Edit Modal HTML -->
    <div id="editCourseModal"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="access-form"
                      action="handlers/editCourseHandler.php"
                      method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Course information</h4>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrapper">
                            <input type="hidden"
                                   name="course_id"
                                   value="">
                        </div>
                        <div class="form-wrapper">
                            <input type="text"
                                   name="course_title"
                                   placeholder="Course Title"
                                   class="form-control"
                                   required>
                            <i class="zmdi zmdi-book"></i>
                        </div>


                        <div class="form-wrapper">
                            <select name="semester"
                                    id=""
                                    class="form-control"
                                    required>
                                <option value=""
                                        disabled
                                        selected>Semester</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                            </select>
                            <i class="zmdi zmdi-caret-down"
                               style="font-size: 17px"></i>
                        </div>

                        <div class="form-wrapper">
                            <select name="teacher_id"
                                    id=""
                                    class="form-control"
                                    required>
                                <option value=""
                                        disabled
                                        selected>Teacher</option>

                                <?php if (count($teacher_list) > 0) {
                                    foreach ($teacher_list as $teacher) { ?>
                                <option value=<?php echo $teacher["user_id"]; ?>><?php echo $teacher["name"]; ?>
                                </option>
                                <?php }
                                } ?>
                            </select>
                            <i class="zmdi zmdi-caret-down"
                               style="font-size: 17px"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button"
                               class="btn btn-danger"
                               data-dismiss="modal"
                               value="Cancel">
                        <input type="submit"
                               class="btn btn-success"
                               name="edit_course"
                               value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteCourseModal"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="handlers/deleteCourseHandler.php"
                      method="get">
                    <div class="modal-header">

                        <h4 class="modal-title">Remove Student</h4>
                        <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this course?</p>
                        <p class="text-warning">
                            This action cannot be undone.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <input type="button"
                               class="btn"
                               style="border: 1px solid black; color:black; "
                               data-dismiss="modal"
                               value="Cancel">
                        <input type="hidden"
                               name="course_id"
                               value="">
                        <input type="submit"
                               name="delete_course"
                               class="btn btn-danger"
                               value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>