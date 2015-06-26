<?php

require "form_handlers/registration.php";
if (isset($_SESSION['login'])) {
    
    $username = $_SESSION['username'];
    $query = "SELECT Title,Course_Name,File_Name From upload WHERE Author='$username'";
    $result = db_select($query);
    //print_r($result);
    $i=0; $j=0;
    $file=false;
   foreach($result as $x => $x_value) {
       foreach ($x_value as $value){
       $file[$i][$j]=$value;
       $j++;
       }
       $i++;
       $j=0;
    }

    $query = "SELECT * FROM login Where userName='$username'";
    $query = db_select($query);
    $gender = $query[0]['gender'];
    $profile = $query[0]['profile_pic'];
    $email=$query[0]['email'];
    $password=$query[0]['password'];
    $name=$query[0]['first_name'];
    $lname=$query[0]['last_name'];
    
 
    echo "<div class='container' ng-controller='profileCtrl'>
            <div class='capitalize'>  <h1>$name $lname</h1> </div>
            <div class='jumbotron'>";
    echo "<div class='row'>
                    <div class='col-md-4'></div>
                        <div class=\"col-md-4\">";
    if ($profile) {
        echo" <img id=\"profileImg\" src=\"views/uploadFiles/profile/$profile\" alt=\"\"/>";
    } else {
        if ($gender == 'male') {
            echo" <img id=\"profileImg\" src=\"images/maleAnonymusPic.jpg\" alt=\"\"/>";
        } else
        if ($gender == 'female') {
            echo "<img id=\"profileImg\" src=\"images/girlAnonymusPic.jpg\" alt=\"\"/>";
        } else
            echo "<img id=\"profileImg\" src=\"images/anonymusOther.jpg\" alt=\"\"/>";
    }
    echo "</div>
                    </div>
                              <div class=\"row\">
                                <div class=\"col-lg-4\"></div>
                                <div class=\"col-md-4\"></div>
                              </div>
                              <form class=\"form-horizontal\">
                                <div class=\"form-group\">
                                    <label class=\"col-sm-2 control-label\">User Name</label>
                                    <div class=\"col-sm-10\">
                                         <div class=\"form-control-static \">$username</div>
                                    </div>
                                    <label class=\"col-sm-2 control-label\">Password</label>
                                    <div class=\"col-sm-10\"><div class=\"form-control-static \">$password</div>
                                </div>
                                    <label class=\"col-sm-2 control-label\">Email</label>
                                    <div class=\"col-sm-10\">
                                        <div class=\"form-control-static\">$email</div>
                                    </div>";
                                    if($file){
                                    echo "<label class=\"col-sm-2 control-label\"/>Uploads </label>
                                    <div class=\"col-md-9\">
                                        <div class=\"form-control-static\">
                                            <ol>";
                                                foreach($file as $val){
                                                   echo "<li><b>Name:</b> $val[0]<br>"
                                                           . "<b>Title:</b> $val[1]<br>"
                                                           . " <a href=\"views/uploadFiles/$val[2]\"> $val[2] </a> </li>";
                                                 
                                              }
                                                    
                                        echo "</ol>
                                        </div>";
                                    }   
                                   echo "</div>
                                </div>
                        </div>
                    </div>";
} else {
    include "form_handlers/permissionDenied.php";
}
?>


