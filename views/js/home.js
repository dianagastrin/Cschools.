'use strict';

angular.module('cschools.home',[])


.controller('homeCtrl', ['$scope','$location', function($scope, $location) {
  console.debug("home controller init");
  $scope.shouldShowSearchHelp = false;

  var courses = [
    { id: 0, name: "Introduction to computer science"},
    { id: 3, name: "Algebra 1"},
    { id: 9, name: "Algebra 2"},
    { id: 12, name: "Calculus 1"},
    { id: 14, name: "Calculus 2"},
  ];

  $scope.courses = courses;

  $scope.search = function(){
    console.log("search called with ", $scope.search_key);
  }

  $scope.shouldHideSearchHelp = function(){
    if(!$scope.search_key || $scope.search_key == ""){
      $scope.shouldShowSearchHelp = false;
    }
    else{
      $scope.shouldShowSearchHelp = true;
    }
  }

  $scope.goToCoursePage = function(id,name){
    console.log("going to course page for: "+ name + "("+id+")" );
    $location.url('/index.php?action=course&id='+id+'&name='+name);
  }
}]);