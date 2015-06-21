<?php
    // handle uploadFile
    if(isset($_POST['submit'])){
        echo "Submiting..\n";

        //adding new entry
        if(isset($_POST['name'])){
            $_POST['name'] = filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($_POST['name'] == "") {
                pop_error("Please enter a valid course name.");
                return;
            }
        }
        else{
            pop_error("Please enter course name.");
            return;
        }
        $cname= preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['name']);

        if(isset($_POST['title'])){
            $_POST['title'] = filter_var($_POST['title'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($_POST['title'] == "") {
                pop_error("Please enter a valid title.");
                return;
            }
        }
        else{
            pop_error("Please enter title.");
            return;
        }
        $title= preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['title']);

        if(isset($_POST['message'])){
            $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if ($_POST['message'] == "") {
                pop_error("Please enter a message to send.");
                return;
            }
        }
        else{
            pop_error("Please enter a message to send.");
            return;
        }
        $notes = $_POST['message'];

        if(isset($_POST['author'])){
            $_POST['author'] = filter_var($_POST['author'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($_POST['author'] == "") {
                pop_error("Please enter a valid name.");
                return;
            }
        }
        else{
            pop_error("Please enter your name.");
            return;
        }
        $author= preg_replace('/[^a-zA-Z\s]/', '', $_POST['author']);

        if (isset($_FILES['fileToUpload'])) {
            if ($_FILES["fileToUpload"]["size"] !=0) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "views/uploadFiles/" . $_FILES["fileToUpload"]["name"]);
                echo "File: '".$_FILES["fileToUpload"]["name"]."' upload successfully!";
                $file=$_FILES["fileToUpload"]["name"];
            }
            else{
                pop_error("file is empty.");
                return;
            }
        }
        else{
            pop_error("Please upload a file.");
            return;
        }

        $insertSql = "INSERT INTO upload (Course_Name, Title, Notes, Author, File_Name) "
            . "VALUES ('$cname', '$title', '$notes', '$author','$file')";

        if(!db_query($insertSql)){
            pop_error("error sending your message");
        }

    }
?>
