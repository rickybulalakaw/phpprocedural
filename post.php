<?php 
session_start();

include "templates/header.php";
include "config/db.php";
$id = $_SESSION['id'];

if(isset($_POST['submit'])){

    $title =  $_POST['title'];
    $content = $_POST['content'];
    $userid =  $id;
    $tag =  $_POST['tag'];

    $sql = "INSERT INTO post(title, content, userid, tag) VALUES (?, ?, ?, ?)";

    echo $title . "<br>";
    echo $content . "<br>";
    echo $userid . "<br>";
    echo $tag . "<br>";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "ssii", $title, $content, $userid, $tag);        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        header("Location: index.php");
    }
}

?>

<div class="col-md-8 offset-md-2">
    <form action="post.php" method="post">
        <h1>Add a post</h1>
        <input type="number" name="userid" value="<?= $id ?>" hidden>

        <label>Title</label>
        <input type="text" name="title" class="form-control" autofocus required>

        <label>Body</label>
        <textarea name="content" id="editor1" cols="30" rows="50" required autofocus></textarea>

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


            ?>
        
        </select>
        
        <br>

        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        
    </form>
</div>

<!-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> -->

<script>
                CKEDITOR.replace( 'editor1' );
            </script>


<?php include "templates/footer.php" ?>