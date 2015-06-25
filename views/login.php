<?php
    require "form_handlers/login.php";
?>
<div class="jumbotron" id="titleLogin" ng-controller="loginCtrl">
    <h3><b>Happy To See You Again</b></h3><br>
    <!-- NEED FILTER USE-->
    <form  method="post" action="" >
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="text" class="form-control input-lg" id="username" name='username' placeholder="User Name" autocomplete="on" required>
                </div></div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="password" class="form-control input-lg" id="password" name='password' placeholder="Password" autocomplete="on" required>
                </div>
            </div>
            <a href="#" onclick="forgot();"> forgot password? </a>
            <br><br>
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Login" >
            <br>
        </div>
    </form>
</div>