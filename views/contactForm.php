
        <?php
        
        $con = mysqli_connect("localhost", "root", "", "Group7");
        #openning the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else {
            echo "connect.<br/>";
        }
        
	#adding new entry
	$str=$_POST['name'];
        if ($str != "") {
            $str = filter_var($str,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($str == "") {
                echo ("lease enter a valid name.<br/><br/>");
            }
            else{
                $name= preg_replace('/[^a-zA-Z\s]/', '', $str);
            }
        }
        else{
            echo ("Please enter your name.<br/>");
        }

        
        if ($_POST['email'] != "") {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo ("$email is <strong>NOT</strong> a valid email address.<br/><br/>");
                $email ="";
            }
            else{
                $email = $_POST['email'];
            }
        } 
        else {
            $email ="";
            echo ("Please enter your email address.<br/>");
        }
        
 
        if ($_POST['message'] != "") {
            $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if ($_POST['message'] == "") {
                echo ("Please enter a message to send.<br/><br/>");
            }
            else{
                $mess = $_POST['message'];
            }
        } 
        else {
            echo ("Please enter a message to send.<br/>");
        }
       
                
        $insertSql = "INSERT INTO contact (Name, Email, Message) "
                    . "VALUES ('$name', '$email', '$mess')";
	if (!mysqli_query($con, $insertSql)) {
            die('Error: ' . mysqli_error($con));
	}

	
	mysqli_close($con);
        
        ?>