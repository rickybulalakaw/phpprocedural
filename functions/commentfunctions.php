<?php 

function getcomments($postid){

    include "../phpprocedural/config/db.php"; 

    $getcomments = "select * from comments where postid = $postid";

    $commentarray = mysqli_query($db, $getcomments);

    if(mysqli_num_rows($commentarray) >= 1){

        

        foreach($commentarray as $comment){

            $commentdata['count'] = mysqli_num_rows($commentarray);

            // get commentid owner 
    
            $commentownername = getcommentowner($comment['userid']);
    
            $commentdata['data'][] = array('comment' => $comment['comment'],
            'commentid' => $comment['id'],
            'timestamp' => $comment['timestamp'],
            'ownerid' => $comment['userid'],
            'owner' => $commentownername);
    
        }

        
        $commentdata['count'] = mysqli_num_rows($commentarray);
    
        return $commentdata;
    } else {
        $commentdata['count'] = 0;

        return $commentdata;
    }

    

}

function getcommentowner($commentownerid){

    include "../phpprocedural/config/db.php";

    $getcommentowner = "select * from user where id = $commentownerid order by timestamp desc";

    $process = mysqli_query($db, $getcommentowner);

    $data = mysqli_fetch_assoc($process);

    $commentownername = $data['firstname']. " " .$data['lastname'];

    return $commentownername;

}



function addcomment($postid, $userid, $comment){

    include "../phpprocedural/config/db.php"; 

    $sql = "INSERT INTO comments (comment, userid, postid) VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "sii", $comment, $userid, $postid);        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        header("Location: readpost.php?id=$postid");
    }

}


?>