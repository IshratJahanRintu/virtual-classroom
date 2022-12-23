<?php
include_once '../Database.php';

include_once '../classes/course.php';

if (isset($_POST['edit_course'])) {
    $edit_info['course_id'] = $_POST['course_id'];
    $edit_info['course_title'] = $_POST['course_title'];
    $edit_info['teacher_id'] = $_POST['teacher_id'];
    $edit_info['semester'] = $_POST['semester'];

    $user = new course();
    $user->editCourse($edit_info);
    header("Location:../course-list.php");
}