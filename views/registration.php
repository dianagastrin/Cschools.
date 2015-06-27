<h1>Join Our Family</h1><br>

<div id="status"></div><div class="container" ng-controller="registrationCtrl">
    <form  method="post" action="index.php?action=profile" enctype="multipart/form-data" >
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <span class="asterix">*</span> First Name: <input type="text" class="form-control input-lg"  name="fname" placeholder="Alan" autocomplete="on" required>
                </div>
                <div class="col-md-4">
                    <span class="asterix">*</span> Last Name: <input type="text" class="form-control input-lg"  name="lname" placeholder="Turing" autocomplete="on" required> 
                </div>
                <div class="col-md-1">
                    Age: <input class="form-control input-lg" type="number" name="age" min="6" max="150">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <span class="asterix">*</span> Email: <input type="email" class="form-control input-lg" name="email" placeholder="Alan10101@example.com" autocomplete="on" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <span class="asterix">*</span> Choose User Name: <input type="text" class="form-control input-lg" name="username" placeholder="Alan10101"  autocomplete="on" required > <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"> 
                    <span class="asterix">*</span>Choose Password(min=6, max=10): <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password"  required> <br>
                    <span class="asterix">*</span>Confirm Password: <input type="password" class="form-control input-lg" id="confirmPass" name="confirmPass" placeholder="Confirm Password" required > <br>
                </div> 
            </div></div>
        <input type="radio" name="gender" value="male" id="male" checked>
        <label for="male">Male</label>
        <input type="radio" name="gender" value="female" id="female">
        <label for="female">Female</label>
        <input type="radio" name="gender" value="other" id="other">  
        <label for="other">Other</label> <br>
        <input type="file" name="fileToUpload" accept="image/*" id="fileToUpload">
        <label for="fileToUpload"> *optional Upload Profile Picture </label>
        <br> <br>
        <input type="checkbox" name="sendEmail" value="1" id="checkEmail" checked>
        <label for="checkEmail"> Send Me Interesting Emails </label>
        <br> <br>
        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit" onclick="return validPass();">
        <input type="reset" class="btn btn-primary btn-success btn-lg" value="Reset"></div>
    </form>


</div>


