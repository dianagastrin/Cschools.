<div class="container" ng-controller="profileCtrl">
    <?php
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
            move_uploaded_file($_FILES["img"]["tmp_name"], "views/upload/" . $_FILES["img"]["name"]);
            $image = "views/upload/" . $_FILES["img"]["name"];
        }
    }
    $alternative = "images/permissionDenied.png";
    ?>
    <div class="capitalize"> <h1><?php echo $fname . $lname ?></h1>
    </div>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <img id="profileImg" src="
            <?php
            if ($username != "")
                echo $image;
            else
                echo $alternative;
            ?>" alt="Profile Picture" >
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-md-4">
            <a href="index.php?action=registration"><?php if ($username == "") echo  "<strong> Register </strong>" ; ?> </a>
            <?php if ($username == "")  echo "for Permission"; ?>
            </div>
        </div>
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">
                    <?php
                    if ($username != "")
                        echo "User Name"
                        ?></label>
                <div class="col-sm-10">
                    <div class="form-control-static "><?php echo $username ?></div>
                </div>
                <label class="col-sm-2 control-label">
                    <?php
                    if ($username != "")
                        echo "Password"
                        ?></label>
                <div class="col-sm-10">
                    <div class="form-control-static "><?php echo $password ?></div>
                </div>
                <label class="col-sm-2 control-label">
                    <?php if ($username != "") echo "Email" ?></label>
                <div class="col-sm-10">
                    <div class="form-control-static "><?php echo $email ?></div>
                </div>
                <label class="col-sm-2 control-label">
                    <?php
                    if ($username != "")
                        echo "Uploads"
                        ?></label>
                <div class="col-sm-10">
                    <div class="form-control-static "> 
                        <?php if ($username != "")
                            echo "<ol>";
                        else
                            echo "<ul>";
                        ?>
                        <li> <a href=""><?php if ($username != "") echo " Algebra-Dimension" ?> </a></li>
                        <li> <a href=""><?php if ($username != "") echo " Computer-Science-SUSU PROBLEM" ?> </a></li>
                        <li> <a href=""><?php if ($username != "") echo " Calculus Integral" ?> </a></div></li>
                    <?php
                    if ($username != "")
                        echo "</ol>";
                    else
                        echo "</ul>";
                    ?>                         
                </div>
            </div>
    </div>
</div>