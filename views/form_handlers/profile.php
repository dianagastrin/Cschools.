<?php
 $username = $_SESSION['username'];
    $query = "SELECT Course_Name,Title,File_Name,real_user From upload Where Author='$username'";
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

    $query = "SELECT gender,profile_pic,email,password,first_name,last_name FROM user_info JOIN user ON user_info.ID=user.ID Where user.userName='$username'";
    $query = db_select($query);
    $gender = $query[0]['gender'];
    $profile = $query[0]['profile_pic'];
    $email = $query[0]['email'];
    $password = $query[0]['password'];
    $fname = $query[0]['first_name'];
    $lname = $query[0]['last_name'];
    ?>
