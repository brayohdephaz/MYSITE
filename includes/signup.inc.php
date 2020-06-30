<?php
if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';


    $username = $_POST['uid'];
    $email= $_POST['mail'];
    $pwd = $_POST['pwd'];
    $pwdRetype = $_POST['pwd-retype'];

    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRetype)){
        header("Location: ../signup.php?error=fieldsempty&uid='$username&mail=$email");
        exit();
    }
    // else if(!preg_match('/^[a-zA-Z0-9]*$/', $uid) || !filter_var($mail, FILTER_VALIDATE_EMAIL)){
    //     header("Location:../signup.php?error=mailuid&uid=$username&mail=$email");
    //     exit();
    // }
    else if(!preg_match('/^[a-zA-Z0-9]*$/', $username)){
        header("Location:../signup.php?error=uid&mail=$email");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location:../signup.php?error=mail&uid=$username");
        exit();
    }
    else if($pwd !== $pwdRetype){
        header("Location:../signup.php?error=errorpass&uid=$username&mail=$email");
        exit();
    }
    else{
        $sql = "SELECT useruid FROM users WHERE useruid =?";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
             header("Location:../signup.php?error=sqlerror");
             exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_execute($stmt);
            // Check if we get a match
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);

            if($resultcheck > 0){
                header("Location:../signup.php?error=usertaken&mail=$email");
                exit();
            }
            else{
                $sql = "INSERT INTO users(useruid, useremail, userpwd) VALUES(?, ?, ?)";

                $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location:../signup.php?error=inserterror");
                            exit();
                        }
                        else{
                            $hashedpwd = password_hash($pwd,PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashedpwd);
                            mysqli_execute($stmt);
                            header("Location:../signup.php?signup=success");
                            exit();
                        }


            }

        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
// INCASE A USER ACCESS THIS FILE SEND THEM BACK TO THE SIGNUP FORM
else{
    header("Location:../signup.php");
    exit();
}

