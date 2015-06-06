'use strict';

angular.module('cschools.registration', [])

.controller('registrationCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
    console.debug("registration controller init");
}]);



function validPass() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("confirmPass").value;
    if (pass1 !== pass2) {
        alert("Passwords Don't Match!");
        return false;
    }
    else {
        return true;
    }
}

