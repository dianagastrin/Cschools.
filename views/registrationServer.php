  <?php
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confirmPass=$_POST['confirmPass'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $confirmPass=$_POST['confirmPass'];
        $gender=$_POST['gender'];
        $sendEmail=$_POST['sendEmail'];

        move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/" . $_FILES["img"]["name"]);
        echo "The file ". $_FILES["img"]["name"]. " with the size of ".$_FILES["img"]["size"]."B was uploaded";
        ?>