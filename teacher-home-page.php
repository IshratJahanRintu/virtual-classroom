<?php
session_start();
if (isset($_SESSION)) {
    if ($_SESSION['user_type'] == 'teacher') {
        include_once 'teacher-navbar.php';
        echo "<h1>welcome Teacher </h>";
    }
}