<?php

        if (isset($_POST['submit'])) {
            $file = $_FILES['fileToUpload']; //this produces an array containing all info about the image
            $fileName = $_FILES['fileToUpload']['name'];
            $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
            $fileSize = $_FILES['fileToUpload']['size'];
            $fileError = $_FILES['fileToUpload']['error'];
            $fileType = $_FILES['fileToUpload']['type'];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $fileDestination = "uploads/$fileName";
            $allowedFileTypes = ['jpg', 'jpeg', 'gif', 'png'];
                if (empty($fileName)) {
                     header("Location: index.php?error=file_upload_empty");
                        exit();
                }
                if (!in_array($fileActualExt, $allowedFileTypes)) {
                    header("Location: index.php?error=unsupported_file_format");
                        exit();
                } 
                if($fileSize > 1000000) { //not more than 1mb
                    header("Location: index.php?error=file_too_big");
                        exit();
                } else {
                    if (file_exists($fileDestination)) {
                    header("Location: index.php?error=file_already_exists");
                            exit();
                } else {
                    if($fileError === 0) {
                        move_uploaded_file($fileTmpName, $fileDestination);
                            header("Location: index.php?success=file_uploaded");
                    } else {
                        header("Location: index.php?error=file_upload_error");
                            exit();
                    }
                } 
                }
                

                
               
 }