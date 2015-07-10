<?php
    require "form_handlers/contact.php";
?>

<h1>Tell Us What's On Your Mind</h1><br>

<div class="container" ng-controller="contactCtrl">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3">What is your name? </div>
            <div class="col-md-5"><input type="text" class="form-control input-lg" name="name" placeholder="John Snow" autocomplete="on" <?php if(isset($_SESSION['username'])) {echo "value='".$_SESSION['username']."'"; } ?> required></div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-3">Where can we contact you back? </div>
            <div class="col-md-5"><input type="email" ng-model="email" class="form-control input-lg" name="email" placeholder="John@CastleBlack.org" required></div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">Color your message   </div>
            <div class="col-md-5"><input type="color" ng-model="color" name="favcolor" ng-change="changeColor()"> &nbsp;*red means you are mad ;)</div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">Anddd.. your message goes here: <br>(min=1;max=255 characters)</div>
            <div class="col-md-5"><textarea name="message" style="color:{{color}}" ng-model="message" class="form-control input-lg" cols="80" rows="10" required placeholder="Happy? Sad? We want to hear!"></textarea></div>
            <div class="col-md-4"></div>
        </div>
      


        <br>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                <input type="reset" class="btn btn-primary btn-success btn-lg" value="Reset" ></div>
            <div class="col-md-4"></div>
        </div>

    </form>
    <br>
</div>

