'use strict';

angular.module('cschools.about',['ngRoute'])
.config(['$routeProvider', function($routeProvider){
  $routeProvider.when('/about', {
    templateUrl: './views/about.html',
    controller: 'aboutCtrl'
  });
}])


.controller('aboutCtrl', ['$scope','$routeParams', function($scope, $routeParams){
  console.debug("about controller init");
}]);