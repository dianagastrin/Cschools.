    <h1>Uploading Files</h1>
    <br>
    <div class="container" ng-controller="uploadFileCtrl">
    <form method="post" action="" enctype="multipart/form-data">   
        <div class="row">
            <div class="col-md-2">Course Name:</div>
            <div class="col-md-5">
                <input type="text" name="name" class="form-control input-lg" ng-model="search_key" name="name" placeholder="Enter Course Name" ng-change="shouldHideSearchHelp()" required>
            </div>
            <div class="col-md-5"></div>
        </div>
        <div class="row">  
            <div class="col-md-1"></div>
            <div class="col-md-7">
                <ul class="coursesTable upload" ng-show="shouldShowSearchHelp"  >
                    <li class="upload" ng-repeat="course in courses| filter : {name : search_key}"  ng-click="getCourseName(course.name)" >{{course.name}}</li>
                </ul>
            </div>
            <div class="col-md-4"></div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-2">Notes:</div>
            <div class="col-md-5">
                <textarea name="message" ng-model="message" class="form-control input-lg" cols="80" rows="7" placeholder="If you have any notes you can write them here.."></textarea></div>
            <div class="col-md-5"></div>
        </div>

        <br>
                <div class="row">
        <div class="col-md-2">
            Author: </div> <div class="col-md-4"><input type="text" class="form-control input-lg" name="author" placeholder="Steve Paul Jobs" autocomplete="on" required>
            </div> </div>  
        <div class="row">
            <div class="col-md-2">File To Upload:</div><br><br>
            <div class="col-md-3">
                <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>
            <div class="col-md-8"></div>
        </div>
        <br>
        <div class="row"> <div class="col-md-2"></div> <div class="col-md-4">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Upload" id="upload" >
                <input type="reset" class="btn btn-primary btn-success btn-lg" value="Reset"> </div>
        </div>
    </form>

</div>
    
    <?php
    if(isset($_POST['submit'])){
        echo "submiting..";
        $err = false;
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
                echo ("Please enter a valid course name.<br/><br/>");
                $err = true;
            }
            else{
                $cname= preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['name']);
            }
        }
        else{
            echo ("Please enter course name.<br/>");
            $err = true;
        }
        
        
        if(isset($_POST['message'])){
            $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
            if ($_POST['message'] == "") {
                echo ("Please enter a message to send.<br/><br/>");
                $err = true;
            }
            else{
                $notes = $_POST['message'];
            }
        } 
        else {
            echo ("Please enter a message to send.<br/>");
            $err = true;
        }

        
        if(isset($_POST['author'])){
            $_POST['author'] = filter_var($_POST['author'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
            if ($_POST['author'] == "") {
                echo ("Please enter a valid name.<br/><br/>");
                $err = true;
            }
            else{
                $author= preg_replace('/[^a-zA-Z\s]/', '', $_POST['author']);
            }
        }
        else{
            echo ("Please enter your name.<br/>");
            $err = true;
        }
       
        

        if (isset($_FILES['fileToUpload'])) {
            if ($_FILES["fileToUpload"]["size"] !=0) {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "views/uploadFiles/" . $_FILES["fileToUpload"]["name"]);
                echo "the file: '".$_FILES["fileToUpload"]["name"]."' succesfully upload.";
                $file=$_FILES["fileToUpload"]["name"];
            }
            else{
                echo "file is empty.";
                $err = true;
            }
        }
        else{
           echo "please upload a file."; 
           $err = true;
        }
        
        if (!$err){
        $insertSql = "INSERT INTO upload (Course_Name, Notes, Author, File_Name) "
                    . "VALUES ('$cname', '$notes', '$author','$file')";
	if (!mysqli_query($con, $insertSql)) {
            die('Error: ' . mysqli_error($con));
	}
        }

	
	mysqli_close($con);
    }
        
        ?>