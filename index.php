<?php
session_start();
include "config/db.php";
include "templates/header.php";

?>

<?php if(isset($_SESSION['signin_succcess'])){ ?>
    <p>Hello <?= $_SESSION['firstname'] ?></p>

<?php } ?>

<?php 
    $query = "select * from post order by timestamp desc";
    $process = mysqli_query($db, $query);
    if(mysqli_num_rows($process) >= 1){
        foreach($process as $post){ ?>
        <h2><?= $post['title'] ?></h2>
        <?= $post['content'] ?>
        <br>
        <small>Tag: <?php 
        
        $gettag = "select tag from tags where id = ". $post['tag'];
        $processgettag = mysqli_query($db, $gettag);
        $tag = mysqli_fetch_assoc($processgettag);
       
        echo $tag['tag'];
        
        ?></small>
        <br>
        <small>Posted by: <?php 
        $getpostowner = "select * from user where id = ".$post['userid']; // 
        $processget = mysqli_query($db, $getpostowner);
        $getdata = mysqli_fetch_assoc($processget);
        $post_fname = $getdata['firstname'];
        $post_lname = $getdata['lastname'];
        echo "<a href='userprofile.php?id=".$post['userid']."'>$post_fname  $post_lname</a>";
        ?>
         <?= $post['timestamp'] ?></small>

        <?php } ?>

    <?php } else { ?>
    <p>Sorry, there is no post yet.</p>

    <?php }
?>

<?php include "templates/footer.php"; ?>

