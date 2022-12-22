<?php

include_once '../Database.php';
include_once '../classes/user.php';
if (isset($_GET['delete_student'])) {

    $user = new user("student");
    $user->deleteUser($_GET['user_id']);
    header('Location:../student-list.php');
}