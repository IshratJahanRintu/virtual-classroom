<?php

session_start();
include_once '../Database.php';

include_once '../classes/user.php';
// include_once '../classes/users/farmer.php';
// include_once '../classes/users/admin.php';
// include_once '../classes/users/customer.php';
// include_once '../classes/users/agriculturist.php';
// include_once 'UserFactory.php';
if (isset($_POST['submit'])) {
    $login_info['email'] = $_POST['email'];
    $login_info['password'] = $_POST['password'];




    $user = new user("both");
    $user->login($login_info);
}