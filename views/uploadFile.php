<?php
    require "form_handlers/uploadFile.php";
?>
<h1>Uploading Files</h1>
<br>
<div class="container" ng-controller="uploadFileCtrl">
<form method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-2">Course Name:</div>
        <div class="col-md-5">
            <input type="text" name="name" class="form-control input-lg" ng-model="search_key" name="name" placeholder="Enter Course Name" ng-change="shouldHideSearchHelp()" required>
        </div>
        <div class="col-md-5"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">Document Title:</div>
        <div class="col-md-5">
            <input type="text" name="title" class="form-control input-lg" ng-model="title"  placeholder="Enter title" required>
        </div>
        <div class="col-md-5"></div>
    </div>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <ul class="coursesTable upload" ng-show="shouldShowSearchHelp"  >
                <li class="upload" ng-repeat="course in courses| filter : {name : search_key}"  ng-click="getCourseName(course.name)" >{{course.name}}</li>
            </ul>
        </div>
        <div class="col-md-4"></div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-2">Notes:</div>
        <div class="col-md-5">
            <textarea name="message" ng-model="message" class="form-control input-lg" cols="80" rows="7" placeholder="If you have any notes you can write them here.."></textarea></div>
        <div class="col-md-5"></div>
    </div>

    <br>
            <div class="row">
    <div class="col-md-2">
  
         Author: </div> <div class="col-md-4"><input type="text" class="form-control input-lg" name="author" placeholder="Steve Paul Jobs" autocomplete="on" <?php if(isset($_SESSION['username'])) {echo "value='".$_SESSION['username']."'"; echo "disabled";} ?> required>
        
        </div> </div>
    <div class="row">
        <div class="col-md-2">File To Upload:</div><br><br>
        <div class="col-md-3">
            <input type="file" name="fileToUpload" id="fileToUpload" required>
        </div>
        <div class="col-md-8"></div>
    </div>
    <br>
    <div class="row"> <div class="col-md-2"></div> <div class="col-md-4">
            <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Upload" id="upload" >
            <input type="reset" class="btn btn-primary btn-success btn-lg" value="Reset"> </div>
    </div>
</form>

</div>
