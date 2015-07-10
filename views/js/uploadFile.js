'use strict';

angular.module('cschools.uploadFile',[])

.controller('uploadFileCtrl', ['$scope','$routeParams', function($scope, $routeParams){
  console.debug("uploadFile controller init");
 
 var courses = [
    { id: 0, name: "Introduction to computer science"},
    { id: 1, name: "Algebra 1"},
    { id: 2, name: "Algebra 2"},
    { id: 3, name: "Calculus 1"},
    { id: 4, name: "Calculus 2"},
    { id: 5 ,name: "Data Structurs"},
    { id: 6, name: "Automata And Formal Language"},
    { id: 7, name: "Compiler"},
    { id: 8, name: "Priniciples Of Programming Languages"},
    { id:9, name: "Web"},
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
