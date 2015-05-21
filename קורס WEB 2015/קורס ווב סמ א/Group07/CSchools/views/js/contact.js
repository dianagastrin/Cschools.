'use strict';

angular.module('cschools.contact',['ngRoute'])

.config(['$routeProvider', function($routeProvider){
  $routeProvider.when('/contact', {
    templateUrl: './views/contact.html',
    controller: 'contactCtrl'
  });
}])


.controller('contactCtrl', ['$scope','$routeParams', function($scope, $routeParams){
  console.debug("contact controller init");
  $scope.color = "#000000";

  $scope.submit = function(){
    console.log("not implemented yet");
  };

  $scope.changeColor = function(){
    console.log('color selected:'+ $scope.color);
  }


}]);