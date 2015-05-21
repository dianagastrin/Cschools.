'use strict';

angular.module('cschools.uploadFile',['ngRoute'])
.config(['$routeProvider', function($routeProvider){
  $routeProvider.when('/uploadFile', {
    templateUrl: './views/uploadFile.html',
    controller: 'uploadFileCtrl'
  });
}])


.controller('uploadFileCtrl', ['$scope','$routeParams', function($scope, $routeParams){
  console.debug("uploadFile controller init");
 
 var courses = [
    { id: 0, name: "Introduction to computer science"},
    { id: 3, name: "Algebra 1"},
    { id: 9, name: "Algebra 2"},
    { id: 12, name: "Calculus 1"},
    { id: 14, name: "Calculus 2"}
  ];

  $scope.courses = courses;

  $scope.search = function(){
    console.log("search called with ", $scope.search_key);
  };

  $scope.shouldHideSearchHelp = function(){
    if(!$scope.search_key || $scope.search_key === ""){
      $scope.shouldShowSearchHelp = false;
    }
    else{
      $scope.shouldShowSearchHelp = true;
    }
  };
 $scope.getCourseName = function(name){
    $scope.search_key=' '+name;
 };
 
}]);