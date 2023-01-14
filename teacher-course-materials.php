<?php
session_start();
if (isset($_SESSION["course_id"])) {
    $course_id = $_SESSION["course_id"];
    include_once 'teacher-navbar.php';
    include_once 'Database.php';
    include_once 'classes/content.php';
    include_once 'classes/course.php';
    $c = new content();
    $course = new course();
    $course_id = $_SESSION["course_id"];
    $course_title = $course->getCourseInfo("course_title", $course_id);
    $content_info['course_id'] = $_SESSION["course_id"];
    $video_list = $c->viewSpecificCourseVideos($content_info);
    $document_list = $c->viewSpecificCourseDocuments($content_info);
    $slide_list = $c->viewSpecificCourseSlides($content_info);

?>

    <div class="course-whole-container">
        <nav class="course-navbar">
            <ul>
                <div class="course-heading"><?= $course_title ?></div>
                <li><a href="teacher-view-course.php?course_id=<?= $course_id; ?>">summary </a> </li>
                <li><a href="announcement-page.php">Announcement</a></li>
                <li class="active-list"><a href="teacher-course-materials.php">Course Materials</a></li>
                <li>Assignments</li>
                <li><a href="teacher-course-students.php">Students</a></li>
                <li>Exams</li>
            </ul>
        </nav>

        <div class="course-main-content">
            <section class="add-content">
                <h1 class="heading">Add content</h1>
                <div class="add-form">
                    <div class="drop-zone">
                        <form enctype="multipart/form-data" action="handlers/addContentHandler.php" method="post">
                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                            <input id="content-file" type="file" required name="content_file" accept="video/*, .doc , .docx , .ppt , .pptx, .pdf" class="drop-zone__input">


                    </div>
                    <div class="content-info">

                        <textarea required name="content_topic" placeholder="Write the topic" rows="5"></textarea>
                        <input class="notice-btn" name="add_content" type="submit" value="Upload">

                    </div>
                    </form>
                </div>

            </section>


            <section class="playlist-videos">
                <h1 class="heading">playlist videos</h1>

                <div class="box-container">

                    <?php if (count($video_list) > 0) {
                        foreach ($video_list as  $video) {
                            # code...

                    ?>
                            <a href="#playVideoModal" data-toggle="modal" data-source="<?php echo "contents/" . $video['content_file'] ?>" class="box">
                                <i class="fas fa-play"></i>
                                <img src="images/video1.png" alt="" />


                                <h3><?= $video['content_topic'] ?></h3>

                            </a>

                    <?php }
                    } ?>








                </div>

                <!-- video modal -->
                <div id="playVideoModal" class="modal fade ">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 543px; height: 440px;">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">

                                <video id="tutorial" style="height: 350px;width:480px" src="" controls></video>
                            </div>


                        </div>
                    </div>
                </div>


            </section>

            <section class="playlist-videos">

                <h1 class="heading">documents</h1>
                <div class="box-container">

                    <?php if (count($document_list) > 0) {
                        foreach ($document_list as  $document) {
                            # code...

                    ?>
                            <a href="handlers/download.php?file_name=<?php echo $document['content_file'] ?> " class=" box">
                                <i class="zmdi zmdi-download"></i>
                                <img src="images/document.jpg" alt="" />


                                <h3><?= $document['content_topic'] ?></h3>



                            </a>

                    <?php }
                    } ?>








                </div>
            </section>


            <section class="playlist-videos">

                <h1 class="heading">Slides</h1>
                <div class="box-container">

                    <?php if (count($slide_list) > 0) {
                        foreach ($slide_list as  $slide) {
                            # code...

                    ?>
                            <a href="handlers/download.php?file_name=<?php echo $slide['content_file'] ?> " class=" box">
                                <i class="zmdi zmdi-download"></i>
                                <img src="images/ppt.png" alt="" />


                                <h3><?= $slide['content_topic'] ?></h3>



                            </a>

                    <?php }
                    } ?>








                </div>
            </section>





        </div>





    </div>
<?php
}
include_once 'footer.php' ?>