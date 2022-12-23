<?php
include_once '../Database.php';

include_once '../classes/user.php';

if (isset($_POST['edit_teacher'])) {
    $edit_info['user_id'] = $_POST['user_id'];
    $edit_info['name'] = $_POST['name'];
    $edit_info['contact_no'] = $_POST['phone'];
    $edit_info['designation'] = $_POST['designation'];

    $user = new user("teacher");
    $user->editTeacher($edit_info);
    header("Location:../teacher-list.php");
}