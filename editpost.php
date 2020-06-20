<?php 
session_start();

include "templates/htmlheader.php";
include "config/db.php";
include "functions/systemfunctions.php";
include "functions/postfunctions.php";
checksignin();

$id = $_SESSION['id'];

// ensures that the URL is complete
if(!isset($_GET['id'])){
    echo "You are accessing this page with incomplete parameters.";
    return;
}
$postid = $_GET['id'];

// checks that there is a post with that ID

$postdata = getpost($postid);

if($postdata['post'] == ""){
    echo "Sorry, this link is invalid.";
    return;
}

if($postdata['post']['userid'] != $id){
    echo "Posts can only be edited by its owner. You will be redirected to the page to view the page.";
    echo '<meta http-equiv="refresh" content="1;url=readpost.php?id='.$postid.'">';
    return;    

}

if(isset($_POST['submit'])){

    $title =  $_POST['title'];
    $content = $_POST['content'];    
    $postid = $_POST['postid'];
    
    $tag =  $_POST['tag'];

    $sql = "UPDATE post SET title = ?, content = ?, tag = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "ssii", $title, $content, $tag, $postid);        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        header("Location: index.php");
    }
}

?>

<div class="col-md-8 offset-md-2">
    <form action="editpost.php?id=<?= $postid ?>" method="post">
        <h1>Add a post</h1>
        <input type="number" name="postid" value="<?= $postid ?>" hidden>

        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?= $postdata['post']['title']?>" autofocus required>

        <label>Body</label>
        <textarea name="content" id="editor1" cols="30" rows="50" required autofocus><?= $postdata['post']['content']?></textarea>

        <label>Tag</label>
        <select name="tag" class="form-control">
            <option value=""></option>
            <?php 
            // get tags as dropdown options

            $gettags = "select * from tags";
            $process4 = mysqli_query($db, $gettags);
            
            foreach($process4 as $tag) { ?>
                <option value="<?= $tag['id'] ?>"><?= $tag['tag'] ?></option>
            <?php } ?>
        </select>
        
        <br>

        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        
    </form>
</div>


            <script>
                CKEDITOR.replace( 'editor1' );
            </script>


<?php include "templates/footer.php" ?>