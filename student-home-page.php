<?php
session_start();
if (isset($_SESSION)) {
    if ($_SESSION['user_type'] == 'student') {
        include_once 'student-navbar.php';
        echo "<h1>welcome Student </h1>";
    } else {
        header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php");
}