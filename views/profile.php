
<div class="container" ng-controller="profileCtrl">
    <?php
     $fname= $_POST['fname']; 
    $lname= " ".$_POST['lname']; 
    $age = $_POST['age'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPass'];
    $gender = $_POST['gender'];
    (isset($_POST['sendEmail'])) ? $sendEmail = $_POST['sendEmail'] : $sendEmail = 0;
    ($_FILES["img"]["size"] == 0) ? "" : "The file " . $_FILES["img"]["name"] . " with the size of " . $_FILES["img"]["size"] . "B was uploaded";
    move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/" . $_FILES["img"]["name"]);
    ?>
   <h1> <h1><?php echo $fname.$lname ?></h1> </h1> 
    <div class="jumbotron">
        </div>
   
   
   
</div>