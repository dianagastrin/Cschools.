<div ng-controller="uploadFileCtrl">
    <h1>Uploading Files</h1>
    <br>

    <form action="uploadFile.php" method="post" target="_self">
        <div class="row">
            <div class="col-md-2">Course Name:</div>
            <div class="col-md-5">
                <input type="text" class="form-control input-lg" ng-model="search_key" placeholder="Enter Course Name" ng-change="shouldHideSearchHelp()" required>
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
            Author: </div> <div class="col-md-4"><input type="text" class="form-control input-lg" id="author" placeholder="Steve Paul Jobs" autocomplete="on" required>
            </div> </div>  
        <div class="row">
            <div class="col-md-2">Files To Upload:</div><br><br>
            <div class="col-md-3">
                <input type="file" id="file" name="file" multiple="multiple" required/>
            </div>
            <div class="col-md-8"></div>
        </div>
        <br>
        <div class="row"> <div class="col-md-2"></div> <div class="col-md-4">
                <input type="submit" class="btn btn-primary btn-lg" value="Upload" id="upload" />
                <input type="reset" class="btn btn-primary btn-success btn-lg" value="Reset"> </div>
        </div>
    </form>

</div>