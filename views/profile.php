<?php

require "form_handlers/registration.php";
if (isset($_SESSION['isLogged'])) {
   require "form_handlers/profile.php";
    echo "<div class='container' ng-controller='profileCtrl'>
            <div class='capitalize'>  <h1>$fname $lname</h1> </div>
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
    if ($file) {
        echo "<label class=\"col-sm-2 control-label\"/>Uploads </label>
                                    <div class=\"col-md-9\">
                                        <div class=\"form-control-static\">
                                            <ol>";
        foreach ($file as $val) {
            $real_user= $val[3];
            if($real_user==1){
            echo "<li><b>Name:</b> $val[0]<br>"
            . "<b>Title:</b> $val[1]<br>"
            . " <a href=\"views/uploadFiles/$val[2]\"> $val[2] </a> </li>";}
        }

        echo "</ol>
                                        </div>";
    }
    echo "
        </div>
                                </div>
                        </div>
                    </div>";
} else {
    include "form_handlers/permissionDenied.php";
}
?>


