<div class="jumbotron" id="homeTitle" ng-controller="homeCtrl">
    <h1>Enhance your CS knowledge!</h1>
    <p>*Start by selecting for a course name</p>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <input type="text" class="form-control input-lg" ng-model="search_key" placeholder="Enter Course Name" ng-change="shouldHideSearchHelp()">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <ul class="coursesTable" ng-show="shouldShowSearchHelp">
                <a ng-repeat="course in courses | filter : {name : search_key}"  href="index.php?action=course&id={{course.id}}&name={{course.name}}"><li >{{course.name}}</li></a>
            </ul>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

//                $query = "SELECT Course_Name FROM upload GROUP BY Course_Name";
//                $res = db_query($query);
//                if(!$res){
//                    pop_error("error sending your message");
//                }
//                for($i=0; $i < mysqli_num_rows($res); $i++){
//                    $row = mysqli_fetch_assoc($res);
//                    echo "{ id:" . $i . ", name: '". $row['Course_Name'] ."'},";
//                }
//                echo "</div>";