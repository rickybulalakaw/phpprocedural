<?php 
session_start();
// include "config/db.php";
include "templates/htmlheader.php";
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

    <div class="col-md-8 offset-md-2">
        <div class="row bg-light">
            <h1><?= $postdata['post']['title'] ?></h1>    
        </div>

        <div class="row bg-light">
            <div class="col">
                <div class="row">
                    <small>Posted by: <a href="userprofile.php?id=<?= $postdata['post']['userid'] ?>"><?= $postdata['postowner']['firstname']. " " . $postdata['postowner']['lastname'] ?></a></small>
                </div>
                <div class="row">
                    <div class="col">
                        <?= $postdata['post']['content'] ?>
                    </div>
                </div>
                <?php if(isset($_SESSION['signin_success'])){
                    if($_SESSION['id'] == $postdata['post']['userid']) {?>
                <div class="row">
                        <a class="btn btn-primary" href="editpost.php?id=<?= $postdata['post']['id']?>">Edit post</a>
                        <!-- <a class="btn btn-danger" href="commentpost.php?id=<?= $postdata['post']['id'] ?>">Submit comment</a> -->
                
                </div>

                <?php }
                } ?>
            </div>
        </div>
            <br>

        <div class="row bg-light">
            <div >
                <h3 class="ml-1 mr-1">Comments</h3>
            </div>
        </div>    

                <?php if($commentdata['count'] == 0) { ?>

        <div class="row bg-light">
            <div class="col">

                <p>There are no comments for this post.</p>
                <p>Be the <a href="commentpost.php?id=<?= $postdata['post']['id']?>">first to comment on this post!</a></p>

            </div>
        </div>

                <?php } else { ?>

                <?php if(isset($_SESSION['signin_success'])){ ?>

        <div class="row bg-light">
            <div class="col">   
                <p><a class="btn btn-primary btn-sm" href="commentpost.php?id=<?= $postdata['post']['id'] ?>">Add a comment.</a></p>
            </div>
        </div>

                <?php } ?>

        

                <?php

                foreach($commentdata['data'] as $key => $comment){ ?>
                
        <div class="row bg-light">
            <div class="col">
            
                <div class="row ml-1 mr-1"> <!-- ml-1 means left margin value of .25 inch -->
                    <?= $comment['owner'] ?> on <?= $comment['timestamp'] ?> said: 
                </div>
                <div class="row ml-1 mr-1">
                    <div class="col">
                    <?= $comment['comment'] ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <br>
                <?php }

                } // Closes the else on if there is comment ?>
            </div>
        </div>
    </div>

<?php include "templates/footer.php" ?>