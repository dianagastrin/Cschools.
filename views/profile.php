<?php

if (isset($_POST['submit'])) {
    $err = false;
    $con = mysqli_connect("localhost", "root", "", "group7");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        $err = true;
    }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
    $lname = filter_var($lname, FILTER_SANITIZE_STRING);
    $min = 6;
    $max = 120;
    $age = $_POST['age'];
    if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo("Variable value is not within the legal range");
        $err = true;
    }
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $confirmPass = $_POST['confirmPass'];
    $confirmPass = filter_var($confirmPass, FILTER_SANITIZE_STRING);
    if ($password != $confirmPass) {
        echo "Pass don't match";
        $err = true;
    }
    $gender = $_POST['gender'];
    $sendEmail = $_POST['sendEmail'];
    if (!$err) {
        $insertSql = "INSERT INTO login (userName,password,confirm_password,email,first_name,last_name,gender,send_email) "
                . "VALUES ('$username', '$password','$confirmPass','$email','$fname','$lname','$gender','$sendEmail')";
        if (!mysqli_query($con, $insertSql)) {
            die('Error: ' . mysqli_error($con));
        }
        $_SESSION['login'] = true;
        $_SESSION['flname']= $fname." ".$lname;
        echo "$_SESSION ['flname']";
        echo "<script> window.location.href='index.php?action=profile'; </script>";
    }
    mysqli_close($con);
}
?>

<?php

    echo "<div class='container' ng-controller='profileCtrl'>
        <div class='capitalize'> <h1> Profile</h1>
   </div>
  <div class='jumbotron'>";
   if (isset($_SESSION['login'])){
     echo "<div class='row'>
           <div class='col-md-4'></div>
            <div class=\"col-md-4\"><img id=\"profileImg\" src=\"images/anonymusOther.jpg\" alt=\"\"/>
            </div></div> 
                    <div class=\"row\">
           <div class=\"col-lg-4\"></div> 
           <div class=\"col-md-4\">
                   </div>
                    </div> 
                   <form class=\"form-horizontal\">
                   <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">User Name</label>
                   <div class=\"col-sm-10\">
                  <div class=\"form-control-static \">1</div>
                   </div> 
                   <label class=\"col-sm-2 control-label\">Password</label>
                 <div class=\"col-sm-10\"><div class=\"form-control-static \">2</div>
                </div>
                <label class=\"col-sm-2 control-label\">Email</label>
                <div class=\"col-sm-10\">
                    <div class=\"form-control-static\">3</div>
                </div>
                <label class=\"col-sm-2 control-label\"/>
                Uploads
                <div class=\"col-md-9\">
                    <div class=\"form-control-static\"><ol>
                            <li> <a href=\"\"> Algebra-Dimension </a></li>
                            <li> <a href=\"\"> Computer-Science-SUSU PROBLEM</a></li>
                            <li> <a href=\"\"> Calculus Integral </a></li>
                        </ol>
                    </div>
                </div>
            </div>
    </div>
</div>";
}

else {
    
   echo "<div class='row'>
           <div class='col-md-4'></div>
            <div class=\"col-md-4\"><img  src=\"images/permissionDenied.png\" height=\"240px\" width=\"240px\" alt=\"\"/>
            </div></div> ";
}
?>


