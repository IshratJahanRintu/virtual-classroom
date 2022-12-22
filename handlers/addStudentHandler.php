<?php


include_once '../Database.php';

include_once '../classes/user.php';







if (isset($_POST['add_student'])) {

    echo $student_info["email"] = $_POST['email'];
    echo $student_info["password"] = $_POST['password'];
    echo $student_info["name"] =  $_POST['name'];
    echo $student_info["contact_no"] =  $_POST['phone'];
    echo $student_info["user_type"] = 'student';
    $student_info["semester"]
        = $_POST['semester'];

    print_r($student_info);




    $a = new user("student");
    if ($a->addMemeber($student_info)) {
        $_SESSION['message'] = "Student added successfully!";
        header("Location:../student-list.php");
    }
}