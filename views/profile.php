
<div class="container" ng-controller="profileCtrl">
    <?php
    (isset($_POST['fname'])) ? $fname = $_POST['fname'] : $fname = "Profile";
    (isset($_POST['lname'])) ? $lname = " " . $_POST['lname'] : $lname = " ";
    (isset($_POST['age'])) ? $age = $_POST['age'] : $age;
    (isset($_POST['email'])) ? $email = $_POST['email'] : $email = "";
    (isset($_POST['username'])) ? $username = $_POST['username'] : $username = "";
    (isset($_POST['password'])) ? $password = $_POST['password'] : $password = "";
    (isset($_POST['confirmPass'])) ? $confirmPass = $_POST['confirmPass'] : $confirmPass = "";
    (isset($_POST['username'])) ? $username = $_POST['username'] : $username = "";
    (isset($_POST['password'])) ? $password = $_POST['password'] : $password = "";
    (isset($_POST['confirmPass'])) ? $confirmPass = $_POST['confirmPass'] : $confirmPass = "";
    (isset($_POST['gender'])) ? $gender = $_POST['gender'] : $gender = "";
    (isset($_POST['sendEmail'])) ? $sendEmail = $_POST['sendEmail'] : $sendEmail = 0;
    if (isset($_POST['img'])) {
        if ($_FILES["img"]["size"] != 0) {
            "The file " . $_FILES["img"]["name"] . " with the size of " . $_FILES["img"]["size"] . "B was uploaded";
            move_uploaded_file($_FILES["img"]["tmp_name"], "../" . $_FILES["img"]["name"]);
        }
    }
    ?>
    <div class="capitalize"> <h1><?php echo $fname . $lname ?></h1>
    </div>

    <div class="jumbotron">
        <img src="uploads/<?php echo $_FILES["img"]["name"] ?>" alt="Profile Picture" >
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                    <div class="form-control-static "><?php echo $username ?></div>
                </div>
            </div>

    </div>
</form>
</div>

</div>