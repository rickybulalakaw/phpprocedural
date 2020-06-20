<?php 
session_start();
// include "config/db.php";
include "templates/header.php";
include "functions/postfunctions.php";
include "functions/commentfunctions.php";

if(!isset($_GET['id'])){
    echo "Incomplete parameters for this page. Click <a href='index.php'></a> to go to the homepage.";
    return;
}

$postid = $_GET['id'];

$postdata = getpost($postid);

$commentdata = getcomments($postid);

?>

<div class="bg-secondary">
    <div class="col">
        <div class="row ">
            <div class="col-md-8 offset-md-2">
                <h1><?= $postdata['post']['title'] ?></h1>    
            </div>
        </div>

        <div class="row bg-transparent">
            <div class="col-md-8 offset-md-2">
                <small>Posted by: <?= $postdata['postowner']['firstname']. " " . $postdata['postowner']['lastname'] ?> </small>
                <?= $postdata['post']['content'] ?>
                <hr>
                <h3>Comments</h3>
                <?php if($commentdata['count'] == 0) { ?>

                <p>There are no comments for this post.</p>
                <p>Be the <a href="commentpost.php?id=<?= $postdata['post']['id']?>">first to comment on this post!</a></p>


                <?php } else { 

                //   print_r($commentdata);

                foreach($commentdata['data'] as $key => $comment){ ?>
                <div class="row bg-gradient-light">
                
                    
                    <?= $comment['owner'] ?> on <?= $comment['timestamp'] ?> said: <br>
                    <?= $comment['comment'] ?>
                </div>
                <?php }

                } // Closes the else  ?>
            </div>
        </div>
    </div>
</div>

<?php include "templates/footer.php" ?>