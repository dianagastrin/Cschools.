<?php
    // handle contact
    if (isset($_POST['submit'])) {
        $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        //empty input and filter error handling
        if ($_POST['name'] == "" || $name == false) {
            pop_error("Please enter a valid name");
            return;
        }
        if ($_POST['email'] == "" || $email == false) {
            pop_error($email."is <strong>NOT</strong> a valid email address");
            return;
        }
        if ($_POST['message'] == "" || $message == false) {
            pop_error("Please enter a valid message to send");
            return;
        }

        $name = preg_replace('/[^a-zA-Z\s]/', '', $name);

        $insertSql = "INSERT INTO contact (Name, Email, Message) "
            . "VALUES ('$name', '$email', '$message')";

        if(!db_query($insertSql)){
            pop_error("error sending your message");
        }
        else{
            echo "Your message was sent successfully!";
        }
    }
?>
