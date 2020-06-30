<?php

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    print_r($file);
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    // Specify the kind of files we wand

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

     if (in_array($fileActualExt, $allowed)) {

        if($fileError === 0){

            if($fileSize < 5000000){
                // To prevent overwring we create a unque i
                $fileNameNew = uniqid('', true). "." . $fileActualExt;
                $fileDestination =  '../assets/img/'. $fileNameNew;

                // Function to move file from tmp to our folder

                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: ../gallery.php?upload=success"); 
            }
             else{
                    echo 'Your file is too big!';
                  }
        }
        else{
             echo 'There was an error uploading your file';
        }
    }
     else{
        echo 'You can not uplaod files of this type';
    }

}

   
        
            
        

 
        
   