<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';


    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    if(empty($mailuid) || empty($pwd)){
        header("Location:../login.php?login=empty&username=$mailuid");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE useruid = ? OR useremail = ?";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
           header("Location:../login.php?login=sqlerror");
           exit(); 
        }
        else{
            mysqli_stmt_bind_param($stmt, 'ss', $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            // Checks if there is a result in the database

            if ($row = mysqli_fetch_assoc($results)) {
               $pwdcheck = password_verify($pwd, $row['userpwd']);

               if ($pwdcheck == false) {
                   header("Location:../login.php?login=nouser");
                   exit();
               }
               else if($pwdcheck == true){
                    // Create a SESSION
                    session_start();
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['useruid'] = $row['useruid'];
                    header("Location:../index.php?login=success");
                    exit();
               }
               else{
                   header("Location:../login.php?login=wrongpwd");
                   exit(); 
               }
            }
            else{
                header("Location:../login.php?login=nouser");
               exit();
            }

        }
    }

}
else{
    header("Location:../login.php");
    exit();
}