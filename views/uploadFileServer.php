
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
        if(isset($_POST['name'])){
            $_POST['name'] = filter_var($_POST['name'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($_POST['name'] == "") {
                echo ("lease enter a valid course name.<br/><br/>");
            }
            else{
                $cname= preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['name']);
            }
        }
        else{
            echo ("Please enter course name.<br/>");
        }
        
        
        if(isset($_POST['message'])){
            $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if ($_POST['message'] == "") {
                echo ("Please enter a message to send.<br/><br/>");
            }
            else{
                $notes = $_POST['message'];
            }
        } 
        else {
            echo ("Please enter a message to send.<br/>");
        }

        
        if(isset($_POST['author'])){
            $_POST['author'] = filter_var($_POST['author'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($_POST['author'] == "") {
                echo ("lease enter a valid name.<br/><br/>");
            }
            else{
                $author= preg_replace('/[^a-zA-Z\s]/', '', $_POST['author']);
            }
        }
        else{
            echo ("Please enter your name.<br/>");
        }
       
        

        if (isset($_FILES['fileToUpload'])) {
            if ($_FILES["fileToUpload"]["size"] !=0) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../views/uploadFiles/" . $_FILES["fileToUpload"]["name"]);
                echo "the file: '".$_FILES["fileToUpload"]["name"]."' succesfully upload.";
                $file=$_FILES["fileToUpload"]["name"];
            }
            else{
                echo "file is empty.";
                
            }
        }
        else{
           echo "please upload a file."; 
        }
        
        $insertSql = "INSERT INTO upload (Course_Name, Notes, Author, File_Name) "
                    . "VALUES ('$cname', '$notes', '$author','$file')";
	if (!mysqli_query($con, $insertSql)) {
            die('Error: ' . mysqli_error($con));
	}
	echo "1 record added<br><br>";

	
	mysqli_close($con);
        
        ?>
