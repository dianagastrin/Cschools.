'use strict';

angular.module('cschools.quiz',['ngRoute'])
.config(['$routeProvider', function($routeProvider){
  $routeProvider.when('/course/:id/:name/quiz', {
    templateUrl: './views/quiz.html',
    controller: 'quizCtrl'
  });
}])


.controller('quizCtrl', ['$scope','$routeParams', function($scope, $routeParams){
  $scope.courseName = $routeParams.name;
  $scope.courseId = $routeParams.id;
  console.debug("course controller init");
  console.debug("course id: %s course name: %s", $routeParams.id, $routeParams.name);



    var Quiz = [
        { id: 0,option: "option0", name: "ans1", selectedOption:false},
        { id: 1,option: "option1", name: "ans2", selectedOption:false},
        { id: 2, option: "option2",name: "ans3", selectedOption:false},
        { id: 3, option: "option3",name: "ans4", selectedOption:false}
      ];
    $scope.Quiz = Quiz;

    var lastSelectedOption;

    $scope.selectOption = function(id){
        if(lastSelectedOption) lastSelectedOption.selectedOption = false;
        Quiz[id].selectedOption = true;
        lastSelectedOption = Quiz[id];
    }

}]);