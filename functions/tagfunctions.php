<?php 

function gettags(){
    
    include "../phpprocedural/config/db.php";

    $gettags = "select * from tags";
    $process = mysqli_query($db, $gettags);

    return $process;
}

function gettagname($tagid){
    include "../phpprocedural/config/db.php";

    $gettags = "select * from tags where id = $tagid";
    $process = mysqli_query($db, $gettags);
    $tag = mysqli_fetch_assoc($process);
    $tagname = $tag['tag'];

    return $tagname;

}

function addtag($tagname){

    include "../phpprocedural/config/db.php";

    $sql = "INSERT INTO tags(tag) VALUES (?)";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "s", $tagname);        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        header("Location: index.php");
    }

}
?>