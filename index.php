<?php
    session_start();
    require "./db.php";
    require "./utils.php";
    db_connect();
?>
<!DOCTYPE html>
<html ng-app="cschools">
    <head>
        <title>CSchools </title>
        <link rel="shortcut icon" href="images/logo.png" />
        <!-- bootstrap css -->
        <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
        <!--websiteCss-->
        <link rel="stylesheet" href="views/css/registration.css">
        <link rel="stylesheet" href="views/css/uploadFile.css">
        <link rel="stylesheet" href="views/css/about.css">
        <link rel="stylesheet" href="views/css/app.css">
        <link rel="stylesheet" href="views/css/quiz.css">
        <link rel="stylesheet" href="views/css/course.css">
        <link rel="stylesheet" href="views/css/profile.css">
        <link rel="stylesheet" href="views/css/login.css">
        <link rel="stylesheet" href="views/css/home.css">

        <!-- Angular libs -->
        <script src="libs/angular/angular.js"></script>
        <script src="libs/angular/angular-route.js"></script>
        <!--webSite js-->
        <script src="views/js/app.js"></script>
        <script src="views/js/home.js"></script>
        <script src="views/js/course.js"></script>
        <script src="views/js/contact.js"></script>
        <script src="views/js/about.js"></script>
        <script src="views/js/login.js"></script>
        <script src="views/js/quiz.js"></script>
        <script src="views/js/registration.js"></script>
        <script src="views/js/uploadFile.js"></script>
        <script src="views/js/profile.js"></script>

    </head>
    <body ng-controller="mainCtrl">
        <!-- header navigation for the website - will stay on top while page content changes -->
        <nav class="navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div ><a href="index.php?action=home"> <img src="images/logo-newnew.jpg" alt="CSchools" width="130" height="60"> </a></div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="mainNav">                        
                        <li ng-class="{'active':selectedTab === 'home'}" ng-click="selectedTab = 'home'"><a href="index.php?action=home" ng-click="activate($event)">Home</a></li>
                        <li ng-class="{'active':selectedTab === 'about'}" ng-click="selectedTab = 'about'"><a href="index.php?action=about" ng-click="activate($event)">About Us</a></li>
                        <li ng-class="{'active':selectedTab === 'contact'}" ng-click="selectedTab = 'contact'"><a href="index.php?action=contact" ng-click="activate($event)">Contact</a></li>
                        <li ng-class="{'active':selectedTab === 'uploadFile'}" ng-click="selectedTab = 'uploadFile'"><a href="index.php?action=uploadFile" ng-click="activate($event)">Upload File</a></li>
                    </ul>       

                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        // connected
                        if (isset($_SESSION['login'])) {
                            echo "<li ng-class=\"{'active':selectedTab === 'Logout'}\" ng-click=\"selectedTab = 'welcome'\"><a href=\"\"  ng-click=\"activate(\$event)\"> Welcome, ".$_SESSION['username']."</a></li>";
                            echo "<li ng-class=\"{'active':selectedTab === 'Profile'}\" ng-click=\"selectedTab = 'Profile'\" ><a href=\"index.php?action=profile\" ng-click=\"activate(\$event)\" > Profile </a></li>";
                            echo "<li ng-class=\"{'active':selectedTab === 'Logout'}\" ng-click=\"selectedTab = 'Logout'\"><a href=\"index.php?action=logout\"  ng-click=\"activate(\$event)\"> Logout</a></li>";
                        }
                        // not connected
                        else {
                            echo "<li ng-class=\"{'active':selectedTab === 'Login'}\" ng-click=\"selectedTab = 'Login'\"><a href=\"index.php?action=login\"  ng-click=\"activate(\$event)\"> Login </a></li>";
                            echo "<li ng-class=\"{'active':selectedTab === 'registratoin'}\" ng-click=\"selectedTab = 'registration'\"><a href=\"index.php?action=registration\" ng-click=\"activate(\$event)\">Registration</a></li>";
                        }
                        ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- /header end -->

        <!-- Dynamic pages changes here -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?php
                    if (!isset($_GET['action'])) {
                        include "./views/home.php";
                    } else {
                        switch ($_GET['action']) {
                            case "home":
                                include "./views/home.php";
                                break;
                            case "about":
                                include "./views/about.php";
                                break;
                            case "contact":
                                include "./views/contact.php";
                                break;
                            case "uploadFile":
                                include "./views/uploadFile.php";
                                break;
                            case "home":
                                include "./views/home.php";
                                break;
                            case "login":
                                include "./views/login.php";
                                break;
                            case "registration":
                                include "./views/registration.php";
                                break;
                            case "profile":
                                include "./views/profile.php";
                                break;
                            case "course":
                                include "./views/course.php";
                                break;
                            case "logout":
                                session_destroy();
                                echo "<script> window.location.href='index.php?action=home'; </script>";
                                break;
                     
                            default:
                                include "./views/home.php";
                        }
                    }
                    ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <!-- /Dynamic pages end -->

        <!--Facebook Like code-->
        <br>
        <?php //var_dump($_SESSION) ?>

        <div class="fb-like like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        <br>
        <span id="resolution">Recommended Resolution 1024x768</span>     
    </body>
</html>
