<?php 

session_start();

include "templates/htmlheader.php";
include "functions/systemfunctions.php";
include "functions/tagfunctions.php";

checksignin();

if(isset($_POST['submit'])){
    $tagname = $_POST['tag'];

    addtag($tagname);
    header("Location: index.php");
}

?>
<div class="row">
    <div class="col-md-4 offset-md-4">

        <form action="addtag.php" method="post">
        <h1>Add a New Tag</h1>
        <label>Tag Name</label>
        <input type="text" name="tag" autofocus class="form-control">
        <br>

        <input type="submit" name="submit" class="btn btn-primary">

        </form>
    
    </div>

</div>



<?php include "templates/footer.php" ?>