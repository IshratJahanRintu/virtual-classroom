<?php
include_once '../Database.php';
include_once '../classes/notice.php';
$notice = new notice();
if (isset($_POST['edit_notice'])) {
    $edit_info['notice_id'] = $_POST['notice_id'];
    $edit_info['notice_desc'] = $_POST['notice'];
    if ($notice->editNotice($edit_info)) {
        header("Location:../announcement-page.php?");
    }
}