
<div class="jumbotron" id="titleLogin" ng-controller="loginCtrl">
    <h3><b>Happy To See You Again</b></h3><br>
   <form action="login.php" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <input type="text" class="form-control input-lg" id="username" placeholder="User Name" autocomplete="on" required>
                </div></div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <input type="text" class="form-control input-lg" id="password" placeholder="Password" autocomplete="on" required> 
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary btn-lg" value="Login" >
        </div>
</form>
</div>