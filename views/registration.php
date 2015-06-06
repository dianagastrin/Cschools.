
<h1>Join Our Family</h1><br>

<div id="status"></div><div class="container" ng-controller="registrationCtrl">
    <form action="registrationServer.php" method="post" >
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    First Name: <input type="text" class="form-control input-lg" id="FirstName" placeholder="Alan" autocomplete="on" required>
                </div>
                <div class="col-md-4">
                    Last Name: <input type="text" class="form-control input-lg" id="LastName" placeholder="Turing" autocomplete="on" required> 
                </div>
                <div class="col-md-1">
                    Age: <input class="form-control input-lg" type="number" name="age" min="6" max="99">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Email: <input type="email" class="form-control input-lg" id="Email" placeholder="Alan10101@example.com" autocomplete="on" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    Choose User Name: <input type="text" class="form-control input-lg" id="username" placeholder="Alan10101"  autocomplete="on" required> <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Choose Password: <input type="password" class="form-control input-lg" id="password" placeholder="Password"  required> <br>
                </div>
                <div class="col-md-4">
                    Confirm Password: <input type="password" class="form-control input-lg" id="confirmPass" placeholder="Confirm Password"  required> <br>
                </div> 
            </div>
            <input type="radio" name="sex" value="male" id="male" checked>
            <label for="male">Male</label>
            <input type="radio" name="sex" value="female" id="female">
            <label for="female">Female</label>
            <input type="radio" name="sex" value="female" id="other">  
            <label for="other">Other</label> <br>
            <input type="file" id="file" name="file" />
            <label for="file"> *optional Upload Profile Picture </label>

            
            <br> <br>
            <input type="checkbox" name="sendEmail" value="sendEmail" id="checkEmail" checked>
            <label for="checkEmail"> Send Me Interesting Emails </label>
            <br> <br>
            <input type="submit" class="btn btn-primary btn-lg" value="Submit" onclick="return validPass();">
            <input type="reset" class="btn btn-primary btn-success btn-lg" value="Reset"></div>

</form>
</div>


