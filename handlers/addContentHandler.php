<?php
session_start();
include_once '../Database.php';
include_once '../classes/content.php';
$content = new content();
if (isset($_SESSION['course_id'])) {
   echo  $content_info['course_id'] = $_SESSION['course_id'];
   if (isset($_POST['add_content'])) {
      echo  $content_info['content_topic'] = $_POST['content_topic'];

      echo $content_info["content_file"] = $_FILES['content_file']['name'];
      echo   $file_tmp_name = $_FILES['content_file']['tmp_name'];
      echo $file_folder = '../contents/' . $_FILES['content_file']['name'];

      $file_ext = strtolower(end(explode('.', $_FILES['content_file']['name'])));

      $video_extentions = array("WEBM", "mpg", "mp2", "mpeg", "mpe", "mpv", "mp4", "mkv", "avi", "m4p", "m4v", "wmv", "ogg", "ogv");

      $doc_extentions = array('doc', 'docx', 'pdf');
      $slide_extentions = array('ppt', 'pptx');

      if (in_array($file_ext, $video_extentions)) {
         echo $content_info['content_type'] = "video";
      } else if (in_array($file_ext, $doc_extentions)) {
         echo $content_info['content_type'] = "document";
      } elseif (in_array($file_ext, $slide_extentions)) {
         echo $content_info['content_type'] = "slide";
      } else {
         echo "unsupported";
      }

      if ($content->addContent($content_info)) {
         move_uploaded_file($file_tmp_name, $file_folder);
         header('location:../teacher-course-materials.php');
      }
   }
}