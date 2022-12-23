<?php include_once 'admin-navbar.php';
include_once 'Database.php';
include_once 'classes/user.php';

$user = new user("student");

$student_list = $user->viewAllMembers();





?>


<div class="bg-container">
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Students</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addStudentModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New
                                    Student</span></a>

                        </div>
                    </div>
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
                                <th>Semester</th>
                                <th>Actions</th>
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
                                    <td><?php echo $student['semester']; ?></td>
                                    <td>
                                        <a href="#editStudentModal" class="edit" data-toggle="modal" data-userid="<?php echo $student['user_id'] ?>" data-name="<?php echo $student['name'] ?>" data-phone="<?php echo $student['contact_no'] ?>" data-semester="<?php echo $student['semester'] ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteStudentModal" class="delete" data-toggle="modal" data-userid="<?php echo $student['user_id'] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--add Modal HTML -->
    <div id="addStudentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="access-form" action="handlers/addStudentHandler.php" method="post" onsubmit="return validate_mbl_pass()">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrapper">
                            <input type="text" name="name" placeholder="Name" class="form-control" required>
                            <i class="zmdi zmdi-account"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="email" name="email" placeholder="Email Address" class="form-control" required>
                            <i class="zmdi zmdi-email"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="text" name="phone" id="phone" placeholder="Contact no" class="form-control" required>
                            <i class="zmdi zmdi-phone"></i>
                        </div>
                        <div class="form-wrapper">
                            <select name="semester" id="" class="form-control" required>
                                <option value="" disabled selected>Semester</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                            </select>
                            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="password" placeholder="Password" name="password" id="pwd" class="form-control" required>
                            <i class="zmdi zmdi-lock"></i>
                        </div>
                        <div class="form-wrapper">
                            <input type="password" placeholder="Confirm Password" name="r_password" id="c_pwd" class="form-control" required>
                            <i class="zmdi zmdi-lock"></i>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="add_student" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- Edit Modal HTML -->
    <div id="editStudentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="access-form" action="handlers/editStudentHandler.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Student information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrapper">
                            <input type="hidden" name="user_id" value="">

                            <input type="text" name="name" placeholder="Name" class="form-control" required>
                            <i class="zmdi zmdi-account"></i>
                        </div>

                        <div class="form-wrapper">
                            <input type="text" name="phone" placeholder="Contact no" class="form-control" required>
                            <i class="zmdi zmdi-phone"></i>
                        </div>
                        <div class="form-wrapper">
                            <select name="semester" id="" class="form-control" required>
                                <option value="" disabled selected>Semester</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                            </select>
                            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="edit_student" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteStudentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="handlers/deleteStudentHandler.php" method="get">
                    <div class="modal-header">

                        <h4 class="modal-title">Remove Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this student record?</p>
                        <p class="text-warning">
                            This action cannot be undone.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn" style="border: 1px solid black; color:black; " data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="user_id" value="">
                        <input type="submit" name="delete_student" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>