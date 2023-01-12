<?php

include_once '../Database.php';
include_once '../classes/notice.php';
if (isset($_GET['delete_notice'])) {

    $notice = new notice;
    $notice->deleteNotice($_GET['notice_id']);
    header('Location:../announcement-page.php');
}