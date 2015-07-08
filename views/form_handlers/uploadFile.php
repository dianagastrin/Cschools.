<?php

// handle uploadFile
if (isset($_POST['submit'])) {
    $err = false;
    //adding new entry
    if (isset($_POST['name'])) {
        $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($_POST['name'] == "") {
            pop_error("Please enter a valid course name.");
            $err = true;
            return;
        }
    } else {
        pop_error("Please enter course name.");
        $err = true;
        return;
    }
    $cname = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['name']);

    if (isset($_POST['title'])) {
        $_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($_POST['title'] == "") {
            pop_error("Please enter a valid title.");
            $err = true;
            return;
        }
    } else {
        pop_error("Please enter title.");
        $err = true;
        return;
    }
    $title = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['title']);

    if (isset($_POST['message'])) {
        $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        if ($_POST['message'] == "") {
            pop_error("Please enter a message to send.");
            $err = true;
            return;
        }
    } else {
        pop_error("Please enter a message to send.");
        $err = true;
        return;
    }
    $notes = $_POST['message'];

    if (isset($_POST['author'])) {
        $_POST['author'] = filter_var($_POST['author'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($_POST['author'] == "") {
            pop_error("Please enter a valid name.");
            $err = true;

            return;
        }
    } else {
        pop_error("Please enter your name.");
        $err = true;
        return;
    }
    $author = $_POST['author'];
    if (isset($_POST['lecturer'])) {
        $_POST['lecturer'] = filter_var($_POST['lecturer'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($_POST['lecturer'] == "") {
            pop_error("Please enter a valid name.");
            $err = true;

            return;
        }
    } else {
        pop_error("Please enter lecturer name.");
        $err = true;
        return;
    }
    $lecturer = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['lecturer']);
    if (!empty($_FILES['fileToUpload']['name'])) {
        $filename=$_FILES["fileToUpload"]["name"];
        $allowed = array('pdf', 'doc', 'docx', 'pptx', 'ppt');
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $file = microtime() . '.' . $ext;
        if (!in_array($ext, $allowed)) {
            pop_error("unvalid format");
            $err = true;
            return;
        }
        if ($_FILES['fileToUpload']['size'] > 10000000) {
            pop_error("Exceeded filesize limit.");
            $err = true;
            return;
        }
        if (!$err) {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "views/uploadFiles/" . $file);
        } else {
            pop_error("file was not uploaded");
            $err=true;
            return;
        }
    } else {
        pop_error("Please upload a file.");
        $err = true;
        return;
    }

    if (!$err) {
        if (isset($_SESSION['username'])) {
            $real_user = 1;
        } else {
            $real_user = 0;
            $author_guest = $author . " (Guest) ";
            $author = $author_guest;
        }
        $insertSql = "INSERT INTO upload (Course_Name, Title, Notes, Author,lecturer,File_Name,real_user) "
                . "VALUES ('$cname', '$title', '$notes', '$author', '$lecturer','$file','$real_user')";
        pop_success("File uploaded Successfully!");
        if (!db_query($insertSql)) {
            pop_error("error sending your message");
            return;
        }
    } else {
        pop_error("error sending your message");
    }
}
?>
