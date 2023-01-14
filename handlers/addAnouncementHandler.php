<?php

include_once '../Database.php';

include_once '../classes/notice.php';
$n = new notice();
if (isset($_POST['add_notice'])) {
    $notice['notice_desc'] = $_POST['notice'];
    $notice['course_id'] = $_POST['course_id'];
    $notice['time']
        =  date('d-m-y h:i:s');
    if ($n->addNotice($notice)) {
        header("Location:../announcement-page.php");
    }
}