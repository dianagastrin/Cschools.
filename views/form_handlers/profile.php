<?php

 $username = $_SESSION['username'];
    $query = "SELECT Title,Course_Name,File_Name,real_user From upload WHERE Author='$username'";
    $result = db_select($query);
    $i = 0;
    $j = 0;
    $file = false;
    foreach ($result as $x => $x_value) {
        foreach ($x_value as $value) {
            $file[$i][$j] = $value;
            $j++;
        }
        $i++;
        $j = 0;
    }

    $query = "SELECT * FROM user_info JOIN user ON user_info.ID=user.ID Where user.userName='$username'";
    $query = db_select($query);
    $gender = $query[0]['gender'];
    $profile = $query[0]['profile_pic'];
    $email = $query[0]['email'];
    $password = $query[0]['password'];
    $fname = $query[0]['first_name'];
    $lname = $query[0]['last_name'];
    ?>
