<h1>Tell Us What's On Your Mind</h1><br>

<div class="container" ng-controller="contactCtrl">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3">What is your name? </div>
            <div class="col-md-5"><input type="text" ng-model="name" class="form-control input-lg" name="name" placeholder="John Snow" required></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-3">Where can we contact you back? </div>
            <div class="col-md-5"><input type="email" ng-model="email" class="form-control input-lg" name="email" placeholder="John@CastleBlack.org" required></div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">Color your message  </div>
            <div class="col-md-5"><input type="color" ng-model="color" name="favcolor" ng-change="changeColor()"> &nbsp;*red means you are mad ;)</div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">Anddd.. your message goes here:</div>
            <div class="col-md-5"><textarea name="message" style="color:{{color}}" ng-model="message" class="form-control input-lg" cols="80" rows="10" required placeholder="Happy? Sad? We want to hear!"></textarea></div>
            <div class="col-md-4"></div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                <input type="reset" class="btn btn-primary btn-success btn-lg" value="Reset" ></div>
            <div class="col-md-4"></div>
        </div>

    </form>
    <br>
</div>

<?php
    if(isset($_POST['submit'])){
        echo "submiting..";
        $err = false;
        $con = mysqli_connect("localhost", "root", "", "Group7");
        #openning the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            $err = true;
        }
        else {
            echo "connect.<br/>";
        }

        #adding new entry
        $str=$_POST['name'];
        if ($str != "") {
            $str = filter_var($str,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($str == "") {
                echo ("Please enter a valid name.<br/><br/>");
                $err = true;
            }
            else{
                $name= preg_replace('/[^a-zA-Z\s]/', '', $str);
            }
        }
        else{
            echo ("Please enter your name.<br/>");
            $err = true;
        }


        if ($_POST['email'] != "") {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo ("$email is <strong>NOT</strong> a valid email address.<br/><br/>");
                $email ="";
                $err = true;
            }
            else{
                $email = $_POST['email'];
            }
        } 
        else {
            $email ="";
            echo ("Please enter your email address.<br/>");
            $err = true;
        }


        if ($_POST['message'] != "") {
            $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if ($_POST['message'] == "") {
                echo ("Please enter a message to send.<br/><br/>");
                $err = true;
            }
            else{
                $mess = $_POST['message'];
            }
        } 
        else {
            echo ("Please enter a message to send.<br/>");
            $err = true;
        }

        if (!$err){
            echo "no error!";
            $insertSql = "INSERT INTO contact (Name, Email, Message) "
                        . "VALUES ('$name', '$email', '$mess')";
            if (!mysqli_query($con, $insertSql)) {
                die('Error: ' . mysqli_error($con));
            }
            echo "1 record added<br><br>";
        }

        mysqli_close($con);
   
    }
?>