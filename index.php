<?php
session_start();
include "config/db.php";
include "templates/htmlheader.php";
include "functions/tagfunctions.php";

$tags = gettags();

$results_per_page = 5;

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page-1)*$results_per_page;

?>

<?php if(isset($_SESSION['signin_success'])){
    $signinid = $_SESSION['id']; ?>
    

<?php } ?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Latest Posts</h1>        
            </div>

        </div>

    </div>

</div>

<div class="row">

<div class="col-md-6 offset-md-2">
    <div class="row">
        <div class="col">
            
        </div>
    </div>

<?php 
    $query = "select * from post order by timestamp desc limit $start_from, $results_per_page";
    $process = mysqli_query($db, $query);
    if(mysqli_num_rows($process) >= 1){ 
        foreach($process as $post){ ?>
        <h2><a href="readpost.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
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

        <?= substr($post['content'], 0, 250) ?>
        <br>
        <small>Tag: <?php 
        
        $gettag = "select tag from tags where id = ". $post['tag'];
        $processgettag = mysqli_query($db, $gettag);
        $tag = mysqli_fetch_assoc($processgettag);

        echo $tag['tag'];
        ?></small>
        <br>
        <small>
        <?php 
        
        if(isset($_SESSION['signin_success'])) { // checks if the user is signed in
            if($post['userid'] == $signinid){ // checks that the user is also the owner of the post?> 

            <a href='editpost.php?id=<?= $post["id"]?>'>Edit this post</a>

        <?php } // closes check if post owner is same as current owner

            if($post['userid'] != $signinid){ ?>
             <a href="commentpost.php?postid=<?= $post['id']?>">Comment</a>

            <?php } // closes the check if user is owner ?>
        <?php } // closes check if viewer is signed in
        
        ?>

        </small><br>

        <?php } // closes the foreach ?>

    <?php

        $sql = "select count(id) as total from post";
        $processsql = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($processsql);

        $total_pages = ceil($row['total'] / $results_per_page);

        for ($i=1; $i<=$total_pages; $i++) 
            {  // print links for all pages
                    echo "<a class='btn btn-primary' href='index.php?page=".$i."'";
                    if ($i==$page)  echo " class='curPage'";
                    echo ">".$i."</a> ";
            };

    } else { ?>
        <?php if(!isset($_SESSION['signin_success'])) { // checks if the user signed in or not. If signed in, the user will be invited to post ?>
    <p>Sorry, there is no post yet.</p>

    <?php } else { ?>
    <p>Be the first to submit a post!</p>

    <?php } // closes the else if user is signed in ?>
<?php } ?>
</div>

<div class="col-8 col-md-2">
<h2>Available Tags</h2>
<?php foreach($tags as $tag) {?>
<a href="searchposts.php?param=tag&id=<?= $tag['id'] ?>"><?= $tag['tag']?></a><br>
    <?php } ?>

</div>
</div>

<?php include "templates/footer.php"; ?>

