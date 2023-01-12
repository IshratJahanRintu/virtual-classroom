<?php

include_once '../Database.php';

include_once '../classes/notice.php';
$n = new notice();
if (isset($_POST['add_notice'])) {
    $notice['notice_desc'] = $_POST['notice'];

    if ($n->addNotice($notice)) {
        header("Location:../announcement-page.php");
    }
}
