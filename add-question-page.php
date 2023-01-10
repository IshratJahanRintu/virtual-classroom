<?php

if (isset($_GET['exam_id'])) {
    $exam_id = $_GET['exam_id'];
    $total_question = $_GET['total_question'];
    include_once 'teacher-navbar.php';


?>


    <form id="regForm" action="handlers/addQuestionHandler.php" method="post">
        <?php for ($i = 1; $i <= $total_question; $i++) { ?>


            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="heading" style="margin-top: -16px;">Question <?= $i ?></div>
                <div class="form-wrapper"><input type="text" class="form-control" name="question[]" placeholder="Enter Question" /><i class="zmdi zmdi-assignment"></i></div>
                <div class="form-wrapper"><input class="form-control" name="question[]" placeholder="Enter Option 1" /> <i class="zmdi zmdi-collection-item-1"></i></div>
                <div class="form-wrapper"><input class="form-control" name="question[]" placeholder="Enter Option 2" /><i class="zmdi zmdi-collection-item-2"></i></div>
                <div class="form-wrapper"><input class="form-control" name="question[]" placeholder="Enter Option 3" /><i class="zmdi zmdi-collection-item-3"></i></div>
                <div class="form-wrapper"><input class="form-control" name="question[]" placeholder="Enter Option 4" /><i class="zmdi zmdi-collection-item-4"></i></div>
                <div class="form-wrapper"><select name="question[]" style="font-size: 14px;" class="form-control">

                        <option value="" selected>Set the correct option</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select><i class="zmdi zmdi-check-square"></i>
                </div>
                <input type="hidden" name="question[]" value="<?= $exam_id; ?>">
                <!-- <input type="submit"
               name="add_question"
               style="display: none;"> -->

            </div>
        <?php } ?>






        <div style="overflow: auto; ">
            <div style="display: flex; float:right">
                <button style="margin:auto 8px" type="button" class="btn option-btn" id="prevBtn" onclick="nextPrev(-1)">
                    Previous
                </button>
                <button style="margin:auto 8px" class="btn inline-btn" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

    </form>

<?php
    include_once 'footer.php';
}
