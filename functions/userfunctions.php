<?php



function activateuser ($id){

    include "../phpprocedural/config/db.php"; 

    // This function changes the status of the user from Validated to Active

    // This should be restricted to Admin

    $sql = "UPDATE user SET status='Active' WHERE id = $id";
    if($process = mysqli_query($db, $sql)){

        
    header("Location: manageusers.php");

    } else {
        echo $db-> error;
    }

    



}


?>