
        <?php
        
        $str=$_POST['name'];
        if ($str != "") {
            $str = filter_var($str,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($str == "") {
                echo ("lease enter a valid name.<br/><br/>");
            }
            else{
                $name= preg_replace('/[^a-zA-Z0-9\s]/', '', $str);
            }
        }
        else{
            echo ("Please enter your name.<br/>");
        }

        var_dump($name);
        
        if ($_POST['email'] != "") {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo ("$email is <strong>NOT</strong> a valid email address.<br/><br/>");
            }
            else{
                $email = $_POST['email'];
            }
        } 
        else {
            echo ("Please enter your email address.<br/>");
        }

        var_dump($email);
        
 
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
        var_dump($mess);
        ?>
