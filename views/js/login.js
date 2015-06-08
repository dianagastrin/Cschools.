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


  <?php

        function logIn() {
            $con = mysqli_connect("localhost", "root", "", "exDB");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $sql = "SELECT * FROM user WHERE username='" . $_REQUEST['username'] . "'";
            $row = mysqli_fetch_array(mysqli_query($con, $sql));
            mysqli_close();
            if ($_REQUEST['password'] === $row['password']) {
                $_SESSION['timeout'] = time();
                $_SESSION['registered'] = "yes";
                $_SESSION['firstName'] = $row['first_name'];
                $_SESSION['lastName'] = $row['last_name'];
                echo "<script>window.location.reload();</script>";
            } 
            else {
                return false;
            }
        }
        ?>