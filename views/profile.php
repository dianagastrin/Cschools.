<?php
$con = mysqli_connect("localhost", "root", "", "Group7");
if (isset($_POST['submit'])) {
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $email1 = $_POST['email'];
    $email = filter_var($email1, FILTER_SANITIZE_EMAIL);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];
    $gender = $_POST['gender'];
    (isset($_POST['sendEmail'])) ? $sendEmail = $_POST['sendEmail'] : $sendEmail = 0;
    $insertSql = "INSERT INTO login (userName,password,confirm_password,email,first_name,last_name,gender,send_email) "
            . "VALUES ('$username', '$password','$confirmPass','$email','$fname','$lname','$gender','$sendEmail')";
    if (!mysqli_query($con, $insertSql)) {
        die('Error: ' . mysqli_error($con));
    }
    $_SESSION['login'] = true;
    mysqli_close($con);
}
?>
<div class="container" ng-controller="profileCtrl">

    <div class="capitalize"> <h1> Profile</h1>
    </div>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img id="profileImg" src="../images/permissionDenied.png" alt=""/>
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
                    <div class="form-control-static ">1</div>
                </div>
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <div class="form-control-static ">2</div>
                </div>
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <div class="form-control-static ">3</div>
                </div>
                <label class="col-sm-2 control-label"/>
                Uploads
                <div class="col-md-9">
                    <div class="form-control-static "> 
                        <ol>
                            <li> <a href=""> Algebra-Dimension </a></li>
                            <li> <a href=""> Computer-Science-SUSU PROBLEM</a></li>
                            <li> <a href=""> Calculus Integral </a></li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>


