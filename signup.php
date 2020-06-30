
<?php 

// require 'header.php';

?>
<link rel="stylesheet" href="assets/css/styles.css">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<mail>
    <div class=" intro container-fluid mt-5 py-2">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <!-- signup form -->
            <div class="col-sm-4 center">
                
                <form class="table border p-2" action="includes/signup.inc.php" method="POST">
                        <!-- <img class="img-responsive img-thumbnail" src="assets/images/images.png" alt="No avatar"> -->
                        <h1 class="text-center card-header mb-2">SIGNUP FORM</h1>
                    <div class="form-group">
                        <label for="username" >Username</label>
                        <input class="form-control" type="text" name="uid" id="uid">
                    </div>
                    <div class="form-group">
                        <label for="mail" >E-mail</label>
                        <input class="form-control" type="text" name="mail" id="mail">
                    </div>
                    <div class="form-group">
                        <label for="pwd" >Password</label>
                        <input class="form-control" type="password" name="pwd" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd-retype" >Retype Password</label>
                        <input class="form-control" type="password" name="pwd-retype" id="pwd-retype">
                    </div>

                    <button class="btn btn-primary btn-sm btn-block" type="submit" name="signup-submit">Signup</button>
                    <p class="my-3">Already registered? <a class="btn-link" href="login.php">Login here</a></p>
                </form>
                
                

                
            </div>
            <!-- End of signup form -->
            <div class="col-sm-4">
                
            </div>
        </div>
    </div>
</main>


<?php


// require 'footer.php';


?>