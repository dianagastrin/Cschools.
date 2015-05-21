'use strict';

angular.module('cschools.Profile', ['ngRoute'])
        .config(['$routeProvider', function ($routeProvider) {
                $routeProvider.when('/Profile', {
                    templateUrl: './views/Profile.html',
                    controller: 'ProfileCtrl'
                });
            }])


        .controller('ProfileCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
                console.debug("Profile controller init");
            }]);