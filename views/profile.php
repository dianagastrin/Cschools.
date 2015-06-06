
<h1>Alan Turing</h1>
<div class="container" ng-controller="profileCtrl">
    <div class="jumbotron">
        <div class="row"><div class="col-md-3"> </div> <div class="col-md-3">
                <img src="images/Alan_Turing.png" alt="Alan Turing" id="Alan_Turing"></div></div>    
        <br><br>
        <form action="uploadFile.php" method="post" target="_self">
            <div class="row">
                <div class="col-md-1"></div> 
                <div class="col-md-2">First Name:</div>
                <div class="col-md-3">
                    <input type="text" class="form-control input-lg" id="FirstNameProfile" placeholder="Alan" disabled></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">Last Name:</div>
                <div class="col-md-3">
                    <input type="text" class="form-control input-lg" id="LastNameProfile" placeholder="Turing" disabled> </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">Age:</div>
                <div class="col-md-3">
                    <input class="form-control input-lg" type="number" id="AgeProfile" placeholder="22"  disabled></div>
            </div>
            <br>    
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">Email: </div>
                <div class="col-md-3">
                    <input type="email" class="form-control input-lg" id="EmailProfile" placeholder="Alan10101@gmail.com" disabled></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">Your User Name: </div>
                <div class="col-md-3">
                    <input type="text" class="form-control input-lg" id="usernameProfile" placeholder="Alan10101"  disabled></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">Uploaded Summaries: </div>
                <div class="col-md-3">
                    <input type="text" class="form-control input-lg" id="FilesProfileNumber" placeholder="101"  disabled></div>
            </div>
            <br>
        </form>
    </div>
</div>


