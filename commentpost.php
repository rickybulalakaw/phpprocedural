<?php 

session_start();

include "templates/htmlheader.php";
include "functions/postfunctions.php";
include "functions/commentfunctions.php";

if(!isset($_GET['id'])){
    echo "You are accessing this page with incomplete parameters.";
    return;
}

$postid = $_GET['id'];

if(!isset($_SESSION['signin_success'])){
    echo "You need to be signed in to comment to a post. Click <a href='login.php'>here</a> to log in.";

}

$userid = $_SESSION['id'];

$postdata = getpost($postid);

$post_title = $postdata['post']['title'];

if(isset($_POST['submit'])){
    $userid = $_POST['userid'];
    $comment = $_POST['comment'];
    $postid = $_POST['postid'];

    addcomment($postid, $userid, $comment);

}

?>

<div class="col-md-8 offset-md-2">
<h3 class="text-dark">You are commenting on the post entitled <?= $post_title ?></h3>

<form action="commentpost.php?id=<?= $postid ?>" method="post">
<input type="number" name="userid" value="<?=$userid?>" hidden>
<input type="number" name="postid" value="<?=$postid?>" hidden>
<textarea name="comment" id="editor1" cols="30" rows="10"></textarea>
<br>
<input type="submit" name="submit" value="Submit" class="btn btn-primary">

</form>
</div>
<script>
                CKEDITOR.replace( 'editor1' );
            </script>
<?php include "templates/footer.php" ?>