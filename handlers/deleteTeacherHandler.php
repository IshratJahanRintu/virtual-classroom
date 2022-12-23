<?php

include_once '../Database.php';
include_once '../classes/user.php';
if (isset($_GET['delete_teacher'])) {

    $user = new user("teacher");
    $user->deleteUser($_GET['user_id']);
    header('Location:../teacher-list.php');
}
