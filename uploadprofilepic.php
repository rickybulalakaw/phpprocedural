<?php

session_start();

include "config/db.php";


if(isset($_POST['upload'])){

    $id = $_SESSION['id'];

    $file = $_FILES['file'];

    // print_r($file);

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'bmp');

    if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
            if($fileSize < 10000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'assets/profileimages/'.$fileNameNew;
                // print_r($fileExt);
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "update user SET imageid = '$fileNameNew' where id = $id";

                if(mysqli_query($db,$sql)) {
                    header("Location: myprofile.php");
                } else {
                    echo "Error";
                }

            } else {
                echo "Your file is too big.";
                return;
            }

        } else {
            echo "There is an error uploading your file.";
            return;
        }

    } else {
        echo "You cannot upload files of this type.";
        return;

    }

}


?>

