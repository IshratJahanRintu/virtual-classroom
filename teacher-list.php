<?php include_once 'admin-navbar.php';
include_once 'Database.php';
include_once 'classes/user.php';

$user = new user("teacher");

$teacher_list = $user->viewAllMembers();


?>


<div class="bg-container">
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Teachers</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addTeacherModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New
                                    Teacher</span></a>

                        </div>
                    </div>
                </div>
                <?php if (count($teacher_list) > 0) { ?>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>

                                </th>
                                <th>Name</th>
                                <th>Email</th>

                                <th>Phone</th>
                                <th> Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($teacher_list as $teacher) {
                            ?>
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" name="options[]" value="1">

                                        </span>
                                    </td>
                                    <td><?php echo $teacher['name']; ?></td>
                                    <td><?php echo $teacher['email']; ?></td>
                                    <td><?php echo $teacher['contact_no']; ?></td>
                                    <td><?php echo $teacher['designation']; ?></td>
                                    <td>
                                        <a href="#editTeacherModal" class="edit" data-toggle="modal" data-userid="<?php echo $teacher['user_id'] ?>" data-name="<?php echo $teacher['name'] ?>" data-phone="<?php echo $teacher['contact_no'] ?>" data-designation="<?php echo $teacher['designation'] ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteTeacherModal" class="delete" data-toggle="modal" data-userid="<?php echo $teacher['user_id'] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
    <!-- add Modal HTML -->
    <div id="addTeacherModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="access-form" action="handlers/addTeacherHandler.php" method="post" onsubmit="return validate_mbl_pass()">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Teacher</h4>
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
                            <select name="designation" id="" class="form-control" required>
                                <option value="" disabled selected>Designation</option>
                                <option value="Professor">Professor</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                                <option value="Lecturer">Lecturer</option>

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
                        <input type="submit" class="btn btn-success" name="add_teacher" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- Edit Modal HTML -->
    <div id="editTeacherModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="access-form" action="handlers/editTeacherHandler.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Teacher information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrapper">
                            <input type="hidden" name="user_id" value="" required>

                            <input type="text" name="name" placeholder="Name" class="form-control" required>
                            <i class="zmdi zmdi-account"></i>
                        </div>

                        <div class="form-wrapper">
                            <input type="text" name="phone" placeholder="Contact no" class="form-control" required>
                            <i class="zmdi zmdi-phone"></i>
                        </div>
                        <div class="form-wrapper">
                            <select name="designation" id="" class="form-control" required>
                                <option value="" disabled selected>Designation</option>
                                <option value="Professor">Professor</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                                <option value="Lecturer">Lecturer</option>
                            </select>
                            <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="edit_teacher" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteTeacherModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="handlers/deleteTeacherHandler.php" method="get">
                    <div class="modal-header">

                        <h4 class="modal-title">Remove Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn" style="border: 1px solid black; color:black; " data-dismiss="modal" value="Cancel">
                        <input type="hidden" name="user_id" value="">
                        <input type="submit" name="delete_teacher" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>