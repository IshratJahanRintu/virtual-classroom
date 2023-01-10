<?php

include_once '../Database.php';

include_once '../classes/notice.php';
$n = new notice();
if (isset($_POST['add_notice'])) {
    $notice['notice_desc'] = $_POST['notice'];
    $notice['course_id'] = $_POST['course_id'];
    if ($n->addNotice($notice)) {
        echo "Successfully inserted";
    }
}