<?php

// handle registration (in profile page)
if (isset($_POST['submit'])) {
    $err = false;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fnameS = filter_var($fname, FILTER_SANITIZE_STRING);
    $lnameS = filter_var($lname, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $emailS = filter_var($email, FILTER_SANITIZE_EMAIL);
    $username = $_POST['username'];
    $usernameS = filter_var($username, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $passwordS = filter_var($password, FILTER_SANITIZE_STRING);
    $confirmPass = $_POST['confirmPass'];
    $confirmPassS = filter_var($confirmPass, FILTER_SANITIZE_STRING);
    $min_age = 6;
    $max_age = 120;
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $sendEmail = $_POST['sendEmail'];
    $file = false;

    if ($fname != $fnameS || $lname != $lnameS || $email != $emailS || $username != $usernameS || $password != $passwordS || $fnameS = false || $lnameS = false || $ageS = false || $emailS = false || $usernameS = false) {
        pop_error("Un Valid Parameters");
        $err = true;
        return;
    }
    if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min_age, "max_range" => $max_age))) === false) {
        pop_error("Age is not within the legal range");
        $err = true;
        return;
    }
    if ($err == false) {
        $query = "SELECT * From user Where username='$username'";
        $querySel = db_query($query);
        if (mysqli_num_rows($querySel) != 0) {
            pop_error("Username already exists!");
            $err = true;
            return;
        }
    }
    $min = 5;
    $max = 10;
    if (filter_var(strlen($username), FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        pop_error("Username is not within the legal range");
        $err = true;
        return;
    }
    if (filter_var(strlen($password), FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        pop_error("Password is not within the legal range");
        $err = true;
        return;
    }
    if ($password != $confirmPass) {
        pop_error("Passwords Don't Match");
        $err = true;
        return;
    }
    if (!$err) {
        if (!empty($_FILES['fileToUpload']['name'])) {
            $filename=$_FILES["fileToUpload"]["name"];
            $allowed = array('gif','jpg','jpeg','png');
            $ext =strtolower( pathinfo($filename, PATHINFO_EXTENSION));
            $file = microtime() . '.' .$ext;
              if (!in_array($ext, $allowed)) {
                pop_error("unvalid format");
                $err=true;
                return;
            }
            if ($_FILES['fileToUpload']['size'] > 5000000) {
                pop_error("Exceeded filesize limit.");
                $err = true;
                return;
            }
            if(!$err){
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "views/uploadFiles/profile/" .$file);
            }
            else {pop_error ("file was not uploaded");}
        }
        if (!$err) {
            $insertIntoUser = "INSERT INTO user (username,password,confirm_password) "
                    . "VALUES ('$username', '$password','$confirmPass')";
            $insertIntoUserInfo = "INSERT INTO user_info (email,first_name,last_name,gender,send_email,profile_pic)"
                    . "VALUES ('$email','$fname','$lname','$gender','$sendEmail', '$file')";

            if (!db_query($insertIntoUser) ||!db_query($insertIntoUserInfo) ) {
                pop_error("error sending your message");
                return;
            }
            $_SESSION['isLogged'] = true;
            $_SESSION['username'] = $username;
            echo "<script> window.location.href='index.php?action=profile'; </script>";
        } else {
            pop_error("error sending your message");
        }
    }
}
?>