<?php
// handle login
if (isset($_POST['submit'])) {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    //empty input and filter error handling
    if ($_POST['username'] == "" || $username == false) {
        pop_error("Please enter a valid user name");
        return;
    }

    if ($password == "" || $password == false) {
        echo ("Please enter a valid password.<br/><br/>");
        return;
    }

    $username = preg_replace('/[^a-zA-Z0-9\s]/', '', $username);
    $password = preg_replace('/[^a-zA-Z0-9\s]/', '', $password);

    //get user db entries
    $query = db_query("SELECT * FROM login WHERE userName='$username'");
    if($query === false) {
        echo db_error();
        return;
    }

    //try to find a match
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        //try to match password
        if ($password == $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
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
?>
