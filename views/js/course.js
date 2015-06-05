'use strict';

angular.module('cschools.course',[])


.controller('courseCtrl', ['$scope','$routeParams', function($scope, $routeParams){
  $scope.courseName = $routeParams.name;
  $scope.courseId = $routeParams.id;
  console.debug("course controller init");
  console.debug("course id: %s course name: %s", $routeParams.id, $routeParams.name);

  var subjects = [];

  //fill random subjects information
  for(var i=0; i < 10; i++){
    subjects[i] = {
      id:i,
      name:"subject " + (i+1),
      subs:[],
      isSubsVisible: false
    }

    for(var j=0; j<Math.random()*10; j++){
      subjects[i].subs[j] = {
        id: j,
        name: "sub "+(j+1),
        parentId: i
      }
    }
  }
  $scope.subjects = subjects;

  $scope.toggleSubs = function(id){
    subjects[id].isSubsVisible = !subjects[id].isSubsVisible;
  }

  $scope.loadCourseSubjectContent = function(subjectId, subId){
    $scope.text = "//Content for Category "+(subId+1)+" of Subject " + (subjectId+1);
  }
}]);
