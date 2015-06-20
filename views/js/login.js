'use strict';

angular.module('cschools.login',[])

.controller('loginCtrl', ['$scope','$location', '$rootScope', function($scope, $location, $rootScope){
  console.debug("login controller init");
    $scope.connect = function(){
    //need to validate and ask server..
    $rootScope.user = {name: $scope.username};
    $rootScope.isLoggedIn = true;
    $rootScope.login();
    $location.url('/main');}

}]);

