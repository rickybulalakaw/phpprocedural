<?php
session_start();
include "config/db.php";
include "templates/header.php";



?>

<?php if(isset($_SESSION['signin_success'])){
    $signinid = $_SESSION['id']; ?>
    <p>Hello <?= $_SESSION['firstname'] ?></p>

<?php } ?>

<div class="col-md-8 offset-md-2">
    <div class="row">
        <div class="col">
            <h1 class="text-center">Latest Posts</h1>
        </div>
    </div>

<?php 
    $query = "select * from post order by timestamp desc";
    $process = mysqli_query($db, $query);
    if(mysqli_num_rows($process) >= 1){ 
        foreach($process as $post){ ?>
        <h2><?= $post['title'] ?></h2>
        <small>Posted by: <?php 
        $getpostowner = "select * from user where id = ".$post['userid']; // 
        $processget = mysqli_query($db, $getpostowner);
        $getdata = mysqli_fetch_assoc($processget);
        $post_fname = $getdata['firstname'];
        $post_lname = $getdata['lastname'];
        echo "<a href='userprofile.php?id=".$post['userid']."'>$post_fname  $post_lname</a> on";
        ?>

        <?= $post['timestamp']; ?></small>
        <br><br>

        <?= $post['content'] ?>
        <br>
        <small>Tag: <?php 
        
        $gettag = "select tag from tags where id = ". $post['tag'];
        $processgettag = mysqli_query($db, $gettag);
        $tag = mysqli_fetch_assoc($processgettag);
       
        echo $tag['tag'];
        ?>
        </small>
        <br>
        <small>
        <?php 
        
        if(isset($_SESSION['signin_success'])) { // checks if the user is signed in
            if($post['userid'] == $signinid){ // checks that the user is also the owner of the post?> 

            <a href='editpost.php?id=<?= $post["id"]?>'>Edit this post</a>

        <?php } // closes check if post owner is same as current owner

        if($post['userid'] != $signinid){ ?>
            <a href="commentonpost.php?postid=<?= $post['id']?>">Comment</a>

        <?php } // closes the check if user is owner ?>
        <?php } // closes check if viewer is signed in
        
        ?>

        </small>

        <?php } // closes the foreach ?>

    <?php } else { ?>
    <p>Sorry, there is no post yet.</p>

    <?php }
?>
</div>

<?php include "templates/footer.php"; ?>

