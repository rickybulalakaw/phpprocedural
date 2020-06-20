<?php 

session_start();

include "config/db.php";
include "functions/userfunctions.php";
include "functions/systemfunctions.php";


$id = $_GET['id'];
// checksignin


// if(!isset($_SESSION['signin'])){
//     echo "This page can only be accessed by registered users.";
//     return;
// }

// check admin user

if($_SESSION['usertype'] != "Admin"){
    echo "This page can only be accessed by System Administrators.  You will be redirected to the home page and this attempt will be recorded";
    echo '<meta http-equiv="refresh" content="2;url=index.php">';
    return;
}

checksignin();

activateuser($id);

?>