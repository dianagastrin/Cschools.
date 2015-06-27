'use strict';

// app level module
angular.module('cschools', [
  'ngRoute',
  'cschools.home',
  'cschools.course',
  'cschools.contact',
  'cschools.about',
  'cschools.login',
  'cschools.uploadFile',
  'cschools.registration',
  'cschools.profile'
  
])

.controller('mainCtrl',function($scope, $rootScope){
    console.debug("main controller init");
    $scope.selectedTab = "home";


});
//Facebook Code 
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));