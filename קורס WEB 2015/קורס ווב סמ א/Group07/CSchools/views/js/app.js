'use strict';

// app level module
angular.module('cschools', [
  'ngRoute',
  'cschools.home',
  'cschools.course',
  'cschools.contact',
  'cschools.about',
  'cschools.login',
  'cschools.quiz',
  'cschools.uploadFile',
  'cschools.registration',
  'cschools.Profile'
  
])
//defining routing default behavior
.config(['$routeProvider', function($routeProvider) {
    $routeProvider.otherwise({redirectTo: '/home'});
}])

.controller('mainCtrl',function($scope, $rootScope){
    console.debug("main controller init");
    $scope.selectedTab = "home";
$rootScope.isLoggedIn = false;

    function login(){
        var userInfoLi = document.getElementById("userInfo");
        if(!$rootScope.isLoggedIn){
            userInfoLi.innerHTML = "<a href='#/login'>Log In</a>";
        }
        else{
            userInfoLi.innerHTML = "<a> Welcome, "+ $rootScope.user.name +"</a>";
        }
    }

    $rootScope.login = login;

    login();
 
});
//Facebook Code 
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));