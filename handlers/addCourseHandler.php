<?php


include_once '../Database.php';

include_once '../classes/course.php';







if (isset($_POST['add_course'])) {

    echo $course_info["course_title"] = $_POST['course_title'];
    echo $course_info["semester"] = $_POST['semester'];
    echo $course_info["teacher_id"] =  $_POST['teacher_id'];







    $a = new course();
    if ($a->addCourse($course_info)) {
        $_SESSION['message'] = "Course added successfully!";
        header("Location:../course-list.php");
    } else {
        $_SESSION['message'] = "Course  could not be added!";

        header("Location:../course-list.php");
    }
}