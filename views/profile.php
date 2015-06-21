<?php
    require "form_handlers/registration.php";

    echo "<div class='container' ng-controller='profileCtrl'>
            <div class='capitalize'> <h1> Profile</h1>
       </div>
      <div class='jumbotron'>";
    if (isset($_SESSION['login'])) {
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
    }

    else {
        echo "<div class='row'>
                <div class='col-md-4'></div>
                <div class=\"col-md-4\">
                    <img  src=\"images/permissionDenied.png\" height=\"240px\" width=\"240px\" alt=\"\"/>
                </div>
              </div> ";
    }
?>


