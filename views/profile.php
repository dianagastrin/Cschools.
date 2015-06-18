<div class="container" ng-controller="profileCtrl">
    <?php
    $con = mysqli_connect("localhost", "root", "", "Group7");
      if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else {
            echo "connected.<br/>";
    }
    (isset($_POST['fname'])) ? $fname = filter_var ($_POST['fname'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH) : $fname = "Profile";    
    (isset($_POST['lname'])) ? $lname = " " . $_POST['lname'] : $lname = " ";
    (isset($_POST['age'])) ? $age = $_POST['age'] : $age = "";
    (isset($_POST['email'])) ? $email = $_POST['email'] : $email = "";
    (isset($_POST['username'])) ? $username = $_POST['username'] : $username = "";
    (isset($_POST['password'])) ? $password = $_POST['password'] : $password = "";
    (isset($_POST['confirmPass'])) ? $confirmPass = $_POST['confirmPass'] : $confirmPass = "";
    (isset($_POST['username'])) ? $username = $_POST['username'] : $username = "";
    (isset($_POST['password'])) ? $password = $_POST['password'] : $password = "";
    (isset($_POST['confirmPass'])) ? $confirmPass = $_POST['confirmPass'] : $confirmPass = "";
    (isset($_POST['gender'])) ? $gender = $_POST['gender'] : $gender = 'other';
    (isset($_POST['sendEmail'])) ? $sendEmail = $_POST['sendEmail'] : $sendEmail = 0;
    if ($gender == 'male') {
        $image = "images/maleAnonymusPic.jpg";
    } else if ($gender == 'female') {
        $image = "images/girlAnonymusPic.jpg";
    } else
        $image = "images/anonymusOther.jpg";
    if (isset($_FILES['img'])) {
        if ($_FILES["img"]["size"] != 0) {
            move_uploaded_file($_FILES["img"]["tmp_name"], "views/upload/uploadProfilePics/" . $_FILES["img"]["name"]);
            $image = "views/upload/uploadProfilePics/" . $_FILES["img"]["name"];
        }
    }
    ?>
    <div class="capitalize"> <h1><?php echo $fname . $lname ?></h1>
    </div>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <img id="profileImg" src="<?php echo $image;?>">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-md-4">
            </div>
        </div>
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                    <div class="form-control-static "><?php echo $username ?></div>
                </div>
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <div class="form-control-static "><?php echo $password ?></div>
                </div>
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <div class="form-control-static "><?php echo $email ?></div>
                </div>
                <label class="col-sm-2 control-label"/>
                   Uploads
                <div class="col-sm-10">
                    <div class="form-control-static "> 
                        <ol>
                        <li> <a href=""> Algebra-Dimension </a></li>
                        <li> <a href=""> Computer-Science-SUSU PROBLEM</a></li>
                        <li> <a href=""> Calculus Integral </a></div></li>
                        </ol>
                </div>
            </div>
    </div>
</div>

<?php   $insertSql = "INSERT INTO log-in (username, password) "
                    . "VALUES ('$username', '$password')";
	if (!mysqli_query($con, $insertSql)) {
            die('Error: ' . mysqli_error($con));
	}
	echo "1 record added<br><br>";

	
	mysqli_close($con); ?>