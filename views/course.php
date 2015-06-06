<div class="jumbotron" ng-controller="courseCtrl">
    <h2>{{courseName}}</h2>
    <div class="row">
        <div class="col-md-10" >
            <!-- Dynamic pages changes here -->
            <div id="body-text">
                        <pre>
                            {{text}}
                        </pre>               
                </div>
            </div> 
        <div class="col-md-2">
            <ol>
                <li ng-repeat="subject in subjects"> <span ng-click="myVal=toggleSubs(subject.id)" ><a href="">{{subject.name}}</a></span>
                    <ol>
                        <div class="subject"  ng-repeat="sub in subject.subs" ng-show="subject.isSubsVisible"   >
                            <li ><a href="" ng-click="loadCourseSubjectContent(sub.parentId, sub.id)"> {{sub.name}}</a></li>
                        </div>
                    </ol>
                </li>
            </ol>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-4"><a href="#/course/{{courseId}}/{{courseName}}/quiz" class="btn btn-lg btn-success"> Go to Quiz </a></div>
 
    
    
</div>