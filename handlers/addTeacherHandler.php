<?php


include_once '../Database.php';

include_once '../classes/user.php';







if (isset($_POST['add_teacher'])) {

    echo $teacher_info["email"] = $_POST['email'];
    echo $teacher_info["password"] = $_POST['password'];
    echo $teacher_info["name"] =  $_POST['name'];
    echo $teacher_info["contact_no"] =  $_POST['phone'];
    echo $teacher_info["user_type"] = 'teacher';
    $teacher_info["designation"]
        = $_POST['designation'];

    print_r($teacher_info);




    $a = new user("teacher");
    if ($a->addMemeber($teacher_info)) {
        $_SESSION['message'] = "teacher added successfully!";
        header("Location:../teacher-list.php");
    }
}