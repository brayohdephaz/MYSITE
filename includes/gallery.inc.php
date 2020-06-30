<?php

if(isset($_POST['uploadsubmit'])){

    $newfileName = $_POST['filename'];

    // Check if file name is given 
    if(empty($_POST['filename'])){
        $newfileName = "gallery";
    }else{
        $newfileName = strtolower(str_replace(" ", "-", $newfileName));
    }

    $imgTitle = $_POST['imgtitle'];
    $imgDesc = $_POST['imgdesc'];
    
    // Grab the actual file data

    $files = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Get the name and explode it to get the extension
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    // Check if file is allowed
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 2000000){
                $imgFullName = $newfileName . "." . uniqid("", true) . "." . $fileActualExt;

                $fileDestination = "../assets/img/gallery/" . $imgFullName;

                require_once 'dbh.inc.php';

                // CHECK IF OTHER FILEDS ARE EMPTY

                if(empty($imgTitle) || empty($imgDesc)){
                    header("Location:../gallery.php?upload=fieldsEmpty");
                    exit();
                }else{
                    $sql = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location:../gallery.php?upload=sqlerror");
                        exit();
                    }else{
                        mysqli_stmt_execute($stmt);

                        // Get results from the database

                         // Get Results
                        $results = mysqli_stmt_get_result($stmt);

                        $rowCount = mysqli_num_rows($result);

                        // Initialize order number 
                        $setImgOrder = $rowCount + 1;

                        // Insert into the database

                        $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES(?, ?, ?, ?);";
                        
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location:../gallery.php?upload=sqlInserterror");
                                exit();
                            }else{
                                mysqli_stmt_bind_param($stmt, "ssss", $imgTitle, $imgDesc, $imgFullName, $setImgOrder);
                                mysqli_stmt_execute($stmt);

                            // Move the uploaded file to the root folder

                            move_uploaded_file($fileTmpName, $fileDestination);
                            header("Location:../gallery.php?Success");
                            }

                    }

                }

            }else{
                header("Location:../gallery.php?upload=fileSizeError");
                exit();
            } 

        }else{
            header("Location:../gallery.php?upload=fileerror");
            exit(); 
        }

    }else{
        header("Location:../gallery.php?upload=fileNotAllowed");
        exit();
    }
}