<?php

require "form_handlers/registration.php";
if (isset($_SESSION['login'])) {
    $username=$_SESSION['username'];
    $query="SELECT * From login RIGHT JOIN upload ON login.userName=upload.Author";
    $result=db_query($query);
     for($i=0; $i < mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_assoc($result);
                echo "{ id:" . $i . ", name: '". $row['userName'] ."'},";
            }
    
    echo "<div class='container' ng-controller='profileCtrl'>
            <div class='capitalize'>  <h1> Profile</h1>
       </div>
      <div class='jumbotron'>";
    echo "<div class='row'>
               <div class='col-md-4'></div>
                    <div class=\"col-md-4\">
                        <img id=\"profileImg\" src=\"images/anonymusOther.jpg\" alt=\"\"/>
                    </div>
              </div>
              <div class=\"row\">
                <div class=\"col-lg-4\"></div>
                <div class=\"col-md-4\"></div>
              </div>
              <form class=\"form-horizontal\">
                <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\">User Name</label>
                    <div class=\"col-sm-10\">
                         <div class=\"form-control-static \">1</div>
                    </div>
                    <label class=\"col-sm-2 control-label\">Password</label>
                    <div class=\"col-sm-10\"><div class=\"form-control-static \">2</div>
                </div>
                    <label class=\"col-sm-2 control-label\">Email</label>
                    <div class=\"col-sm-10\">
                        <div class=\"form-control-static\">3</div>
                    </div>
                    <label class=\"col-sm-2 control-label\"/>
                    Uploads
                    <div class=\"col-md-9\">
                        <div class=\"form-control-static\"><ol>
                                <li> <a href=\"\"> Algebra-Dimension </a></li>
                                <li> <a href=\"\"> Computer-Science-SUSU PROBLEM</a></li>
                                <li> <a href=\"\"> Calculus Integral </a></li>
                            </ol>
                        </div>
                    </div>
                </div>
        </div>
    </div>";
} else{
    include "form_handlers/permissionDenied.php";
}
?>


