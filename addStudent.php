<?php include_once 'admin-navbar.php' ?>

<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="images/registration-form-1.jpg" alt="">
        </div>
        <form id="access-form" action="handlers/addStudentHandler.php" method="post" onsubmit="return validate_mbl_pass()">
            <h3>Student Information</h3>

            <div class="form-wrapper">
                <input type="text" name="name" placeholder="Name" class="form-control">
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="email" name="email" placeholder="Email Address" class="form-control">
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" name="phone" id="phone" placeholder="Contact no" class="form-control">
                <i class="zmdi zmdi-phone"></i>
            </div>
            <div class="form-wrapper">
                <select name="semester" id="" class="form-control">
                    <option value="" disabled selected>Semester</option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                    <option value="7">7th</option>
                    <option value="8">8th</option>
                </select>
                <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Password" name="password" id="pwd" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" placeholder="Confirm Password" name="r_password" id="c_pwd" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>

            <input class="submit-button" type="submit" name="add_student" value=" Register">

            </input>
        </form>
    </div>
</div>

<?php include_once 'footer.php' ?>