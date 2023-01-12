<?PHP include_once 'teacher-navbar.php';
?>
<div class="col-md-3"></div>
<div class="col-md-6 well">
    <h3 class="text-primary">PHP - Simple Video Upload</h3>
    <hr style="border-top:1px dotted #ccc;" />
    <button type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Video</button>
    <br /><br />
    <hr style="border-top:3px solid #ccc;" />

    // require 'conn.php';

    // $query = mysqli_query($conn, "SELECT * FROM `video` ORDER BY `video_id` ASC") or die(mysqli_error());
    // while ($fetch = mysqli_fetch_array($query)) {

    <div class="video-container">
        <div class="">
            <div class=""
                 style="word-wrap:break-word;">
                <br />
                <h4>Video Name</h4>
                <h5 class="text-primary">video name</h5>
            </div>
            <div class="">
                <video width="100%"
                       height="240"
                       controls>
                    <source src="demo.mkv">
                </video>
            </div>
            <br style="clear:both;" />
            <hr style="border-top:1px groovy #000;" />
        </div>
    </div>



</div>
<div class="modal fade"
     id="form_modal"
     aria-hidden="true">
    <div class="modal-dialog">
        <form action="save_video.php"
              method="POST"
              enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Video File</label>
                            <input type="file"
                                   name="video"
                                   class="form-control-file" />
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-danger"
                            data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button name="save"
                            class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>