'use strict';

angular.module('cschools.login',[])

.controller('loginCtrl', ['$scope','$location', '$rootScope', function($scope, $location, $rootScope){
  console.debug("login controller init");
    $scope.connect = function(){
    $location.url('/main');}

}]);

function forgot(){
 var email = prompt("Please enter your email", "example@example.com");
  if (email != null) {
        alert("Password was sent to : "+email);
    }
 };
 
