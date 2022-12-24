<?php
session_start();
if (isset($_SESSION)) {
    if ($_SESSION['user_type'] == 'admin') {
        include_once 'admin-navbar.php';
        echo "<h1>welcome admin </h>";
    } else {
        header("location:loginpage.php");
    }
} else {
    header("location:loginpage.php");
}