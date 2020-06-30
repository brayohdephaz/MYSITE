<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
// require 'header.php';
?>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm-4">
            </div>
            <!-- LOGIN FORM -->
            <div class="col-sm-4 center p-2 border px-2">   
                <!-- PASSWORD RESET FORM -->
                <?php
                    if(isset($_POST['forgotpwd'])){
                        
                             echo ' <form class="" action="includes/resetpwd.inc.php" method="post">
                <h1 class="text-center card-header mb-2">RESET PASSWORD</h1>
                    <div class="form-group">';
                    // ERROR  HANDLERS
                    //   if (isset($_GET["reseterror"])) {
                    //             if($_GET["reseterror"] = "empty"){
                    //                 // echo "<p class='text-danger'>* Please enter your email!</p>";
                    //             }
                    //             elseif ($_GET["reseterror"] = "sqlerror") {
                    //                 echo "<p class='text-danger'>* ERROR:Communicating with sql!</p>";
                    //             }
                    //             elseif ($_GET["reseterror"] = "nouser") {
                    //                 echo "<p class='text-warning'>* No account under that Username/E-mail!</p>";
                    //             }
                    //             elseif($_GET["reseterror"] = "success") {
                    //                 echo "<p class='text-success'>Email has been sent successfully</p>";
                    //             }
                                
                    //     }
                      echo '  <label class="" for="mailuid">Username/E-mail:</label>
                        <input class="form-control" type="text" name="mailuid" id="mailuid" placeholder="Username/E-mail">
                    </div>
                    <button class="btn btn-sm btn-block bg-info" type="submit" name="reset-submit">RESET</button>
                </form>
                <div class="row">
                        <div class="col-sm-4">
                             <p class="my-3"><a class="btn-link" href="login.php">Login here</a></p> 
                        </div>
                        <div class="col-sm-8">
                           <p class="my-3">Not yet registered? <a class="btn-link" href="signup.php">Signup here</a></p> 
                        </div>
                    </div>
                <!-- END OF PWD RESET -->';
                    }
                    elseif (isset($_GET['reseterror'])) {
                        if($_GET['reseterror'] = 'empty' || $_GET['reseterror'] = 'sqlerror' || $_GET['reseterror'] = 'nouser'|| $_GET['reseterror'] = 'success' ){
                             echo ' <form class="" action="includes/resetpwd.inc.php" method="post">
                <h1 class="text-center card-header mb-2">RESET PASSWORD</h1>
                    <div class="form-group">';
                   
                       echo' <label for="mailuid">Username/E-mail:</label>
                        <input class="form-control" type="text" name="mailuid" id="mailuid" placeholder="Username/E-mail">
                    </div>
                    <button class="btn btn-sm btn-block bg-info" type="submit" name="reset-submit">RESET</button>
               
                </form>
                <div class="row">
                        <div class="col-sm-4">
                             <p class="my-3"><a class="btn-link" href="login.php">Login here</a></p> 
                        </div>
                        <div class="col-sm-8">
                           <p class="my-3">Not yet registered? <a class="btn-link" href="signup.php">Signup here</a></p> 
                        </div>
                    </div>
                <!-- END OF PWD RESET -->';
                        }
                    }
                    else{
                        echo '<form class="" action="includes/login.inc.php" method="post">
                <h1 class="text-center card-header mb-2">ADMIN LOGIN</h1>
                    <div class="form-group">
                        <label for="mailuid">Username/E-mail:</label>
                        <input class="form-control" type="text" name="mailuid" id="mailuid" placeholder="Username/E-mail">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input class="form-control" type="password" name="pwd" id="pwd" placeholder="Password">
                    </div>
                    <button class="btn btn-sm btn-block bg-info" type="submit" name="login-submit">Login</button>
                </form>
                 <div class="row">
                        <div class="col-sm-5">
                           
                               
                        </div>
                        <div class="col-sm-7">
                           
                        </div>
                    </div>';
                    }
                    // <p class="my-3">Not yet registered?  <a class="btn-link" href="signup.php">Signup here</a></p>
                    // <p class="my-3"><form action="login.php" method="post">
                    //                <button class=" btn btn-link" type="submit" name="forgotpwd">Forgot password</button>
                    // </form></p>
                    
                ?>

                
                   
            </div>
            <!-- End of login -->
            <div class="col-sm-4">
            </div>
        </div>
    </div>

    <!--  -->

</body>
</html>