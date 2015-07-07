<div class="jumbotron" ng-controller="courseCtrl">
    <h2><?php echo $_GET['name']; ?></h2>
    <br>
    <div class="row">
        <div class="col-md-4">
            <ol>
                <?php
                    $i=1;
                    $base = "index.php?action=course&id=".$_GET['id']."&name=".$_GET['name']."&fileId=";
                    $query = db_query("SELECT * FROM upload WHERE Course_Name='".$_GET['name']."'");
                    if($query === false) {
                        echo db_error();
                        return;
                    }
                    //try to find a match
                    while( $row = mysqli_fetch_assoc($query)) {
                        echo "<li><a href='".$base.$row['File_ID']."'>".$row['Title']."</a></li>";
                        $i++;
                    }
                ?>
            </ol>
        </div>
        <div class="col-md-8" >
            <!-- Dynamic pages changes here -->
            <div id="body-text">
                        <p class="sikum_body">
                            <?php
                                if(isset($_GET['fileId'])){
                                    $query = db_query("SELECT * FROM upload WHERE File_ID='".$_GET['fileId']."'");
                                    if($query === false) {
                                        echo db_error();
                                        return;
                                    }
                                    if (mysqli_num_rows($query) > 0) {
                                        $row = mysqli_fetch_assoc($query);
                                        echo "<span class='head'>Lecturer: </span>".$row['lecturer']."<br>";
                                        echo "<span class='head'>Notes:</span> <br>".$row['Notes']."<br><br>";
                                        echo "<span class='head'>File link:</span> <br><a href='./views/uploadFiles/".$row['File_Name']."' target='_blank'>".$row['File_Name']."</a><br><br>";
                                        echo "<span class='head'>Uploaded By: </span>".$row['Author']."<br>";                                     

                                    }

                                }
                            ?>
                        </p>
                </div>
            </div> 

    </div>

</div>

