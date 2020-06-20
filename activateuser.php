<?php 

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

// if(!isset($_SESSION['admin'])){
//     echo "This page can only be accessed by System Administrators.";
//     return;
// }

checksignin();

activateuser($id);

?>