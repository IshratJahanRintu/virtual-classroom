<?php

include_once '../Database.php';
include_once '../classes/course.php';
if (isset($_GET['delete_course'])) {

    $user = new course();
    $user->deleteCourse($_GET['course_id']);
    header('Location:../course-list.php');
}