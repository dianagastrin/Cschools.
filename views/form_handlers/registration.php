<?php

// handle registration (in profile page)
if (isset($_POST['submit'])) {
    $err = false;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
    $lname = filter_var($lname, FILTER_SANITIZE_STRING);
    $min = 6;
    $max = 120;
    $age = $_POST['age'];
    if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        pop_error("Age is not within the legal range");
        $err = true;
        return;
    }
    $email1 = $_POST['email'];
    $email = filter_var($email1, FILTER_SANITIZE_EMAIL);
    $username1 = $_POST['username'];
    $username = filter_var($username1, FILTER_SANITIZE_STRING);

    $query = "SELECT username From user WHERE user.name=$username";
    $query = db_select($query);


    $password1 = $_POST['password'];
    $password = filter_var($password1, FILTER_SANITIZE_STRING);
    $confirmPass1 = $_POST['confirmPass'];
    $confirmPass = filter_var($confirmPass1, FILTER_SANITIZE_STRING);
    if ($password != $password1 || $confirmPass != $confirmPass1 || $email1 != $email || $username1 != $username) {
        pop_error("Un Valid Parameters");
        $err = true;
        return;
    }

    /* $min=6; $max=10;
      if (filter_var($password, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
      pop_error("Password is not within the legal range");
      return;
      } */

    if ($password != $confirmPass) {
        pop_error("Passwords Don't Match");
        return;
    }
    $gender = $_POST['gender'];
    $sendEmail = $_POST['sendEmail'];
    $file = false;
    if (isset($_FILES['fileToUpload'])) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "views/uploadFiles/profile/" . $_FILES["fileToUpload"]["name"]);
        $file = $_FILES["fileToUpload"]["name"];
    }

    if (!$err) {
        $insertSql = "INSERT INTO user (username,password,confirm_password) "
                . "VALUES ('$username', '$password','$confirmPass')";

        $insert = "INSERT INTO user_info (email,first_name,last_name,gender,send_email,profile_pic)"
                . "VALUES ('$email','$fname','$lname','$gender','$sendEmail', '$file')";

        if (!db_query($insertSql)) {
            pop_error("error sending your message1");
            return;
        }
        if (!db_query($insert)) {
            pop_error("error sending your message2");
            return;
        }
        $_SESSION['isLogged'] = true;
        $_SESSION['username'] = $username;
        echo "<script> window.location.href='index.php?action=profile'; </script>";
    } else
        pop_error("Un Valid Parameters");
}
?>