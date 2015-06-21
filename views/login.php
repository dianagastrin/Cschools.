
<div class="jumbotron" id="titleLogin" ng-controller="loginCtrl">
    <h3><b>Happy To See You Again</b></h3><br>
    <!-- NEED FILTER USE-->
    <form  method="post" action="" >
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="text" class="form-control input-lg" id="username" name='username1' placeholder="User Name" autocomplete="on" required>
                </div></div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="text" class="form-control input-lg" id="password" name='password1' placeholder="Password" autocomplete="on" required> 
                </div>
            </div>
            <br>
            <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Login" >
            <br>
            <a href="#" onclick="forgot();"> forgot password? </a>
        </div>
    </form>
                <br><button id="logout" onclick="logout();"> logout </button>


    <?php
    $con = mysqli_connect("localhost", "root", "", "Group7");
    if (isset($_POST['submit'])) {
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
       $username1= $_POST['username1'];
        $username1 = filter_var($username1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($_POST['username1'] == "") {
            echo ("Please enter a valid user name.<br/><br/>");
        } else {
            $username = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['username1']);
        }
        $password1=$_POST['password1'];
        $password1 = filter_var($password1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if ($password1 == "") {
            echo ("Please enter a valid password.<br/><br/>");
        } else {
            $password = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['password1']);
        }
        $query = mysqli_query($con, "SELECT * FROM login WHERE userName='$username'");
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbpassword = $row['password'];
                if ($password == $dbpassword) {
                    $_SESSION['login'] = true;
                    $_SESSION['username']=$username;
                    

                    break;
                } else
                    echo "Wrong Password :(";
            }
        } else
            echo "user does not exist!";
    }
    mysqli_close($con);
    if (!isset($_SESSION['login']))
        session_destroy();
    ?>

</div>