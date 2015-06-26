<?php
    // handle registration (in profile page)
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        $lname = filter_var($lname, FILTER_SANITIZE_STRING);
        $min = 6;
        $max = 120;
        $age = $_POST['age'];

        if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
            pop_error("Variable value is not within the legal range");
            return;
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
            pop_error("Pass don't match");
            return;
        }
        $gender = $_POST['gender'];
        $sendEmail = $_POST['sendEmail'];
        $file=false;
         if (isset($_FILES['fileToUpload'])) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "views/uploadFiles/profile/" . $_FILES["fileToUpload"]["name"]);
                $file=$_FILES["fileToUpload"]["name"];
        }
        
        
        $insertSql = "INSERT INTO login (userName,password,confirm_password,email,first_name,last_name,gender,send_email, profile_pic) "
            . "VALUES ('$username', '$password','$confirmPass','$email','$fname','$lname','$gender','$sendEmail', '$file')";

        if(!db_query($insertSql)){
            pop_error("error sending your message");
            return;
        }

        $_SESSION['login'] = true;
        $_SESSION['flname'] = $fname . " " . $lname;
        $_SESSION['username'] = $username;
        echo "<script> window.location.href='index.php?action=profile'; </script>";
    }
?>