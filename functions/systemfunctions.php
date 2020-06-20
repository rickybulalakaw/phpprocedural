<?php 

function checksignin(){
    if(!isset($_SESSION['signin_success'])){
        echo "Sorry, you are accessing a resource is only availble to authorized users. <br>";
        echo "You will be redirected to the login page.";
        
        echo '<meta http-equiv="refresh" content="1;url=login.php">';
    
    }
}