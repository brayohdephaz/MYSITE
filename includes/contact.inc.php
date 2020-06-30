<?php

if(isset($_POST["sendmessage"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        header("Location:../index.php#contact?error=fieldsEmpty");
        exit();
    }else{
        header("Location:../index.php?Success");
        exit();
    }
}else{
    header("Location:../index.php");
    exit();
}
?>