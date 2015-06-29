<?php
// handle login
if (isset($_POST['submit'])) {
    $err=false;
    $username=$_POST['username'];
    $password=$_POST['password'];
    $usernameS = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $passwordS = filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    //handle unvalid user name
   if ($usernameS == "" || $usernameS == false ||$usernameS!=$username ) {
        pop_error("Please enter a valid user name");
        $err=true;
        return;
    }
   //handle unvalid password
    if ($passwordS == "" || $passwordS == false || $password!=$passwordS) {
        pop_error("Please enter a valid password");
        $err=true;
        return;
    }
    if(!$err){
    //get user db entries
    $query = db_query("SELECT * FROM user WHERE user.userName='$username'");
    if($query === false) {
        echo db_error();
        return;
    }
    //try to find a match
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        //try to match password
        if ($password == $row['password']) {
            $_SESSION['username'] = $username;
            $_SESSION['isLogged']=true;
            echo "<script> window.location.href='index.php?action=home'; </script>";
        }
        else {
            
            pop_error("Wrong password");
        }
    }
    //no match found
    else{
        pop_error("User does not exist");
    }
    }
    
}
?>
