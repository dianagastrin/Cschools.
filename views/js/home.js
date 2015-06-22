'use strict';

angular.module('cschools.home')


.controller('homeCtrl', ['courses', '$scope','$location', function(courses, $scope, $location) {
  console.debug("home controller init");
  $scope.shouldShowSearchHelp = false;

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