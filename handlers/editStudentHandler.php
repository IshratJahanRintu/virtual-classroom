<?php
include_once '../Database.php';

include_once '../classes/user.php';

if (isset($_POST['edit_student'])) {
    $edit_info['user_id'] = $_POST['user_id'];
    $edit_info['name'] = $_POST['name'];
    $edit_info['contact_no'] = $_POST['phone'];
    $edit_info['semester'] = $_POST['semester'];

    $user = new user("student");
    $user->editUser($edit_info);
}