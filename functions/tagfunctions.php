<?php 

function gettags(){
    
    include "../phpprocedural/config/db.php";

    $gettags = "select * from tags";
    $process = mysqli_query($db, $gettags);

    return $process;
}

?>