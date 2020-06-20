<?php 
session_start();
include "config/db.php";
include "templates/header.php";

if(!isset($_GET['id']))
{
    echo "The page has incomplete parametes.";
    return;
}

$id = $_GET['id'];

$getprofile = "select * from user where id = $id";
$result = mysqli_query($db, $getprofile);
$user = mysqli_fetch_assoc($result);

$getposts = "select count(id) from post where userid = $id";
$process = mysqli_query($db, $getprofile);
$count = mysqli_fetch_assoc($process);

?>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>Profile Page</h1>
        <hr>
    </div>
    
</div>
<div class="row">
    <div class="col-md-6 offset-md-2">
    Last Name: <?= $user['lastname'] ?> <br>
    First Name: <?= $user['firstname'] ?><br>
    Middle Name: <?= $user['middlename'] ?><br>
    Extension: <?= $user['extension'] ?><br>
    Email: <?= $user['email'] ?><br>
    Date of Birth: <?= $user['dateofbirth'] ?><br>
    Number of posts: <?= $count['id'] ?><br>

    </div>
    <div class="col-md-2">
        <?php if($user['imageid'] == "") { ?>
            No profile pic uploaded
            <!-- <a class="btn btn-primary" href="uploadprofilepic.php?userid=<?= $user['id']?>">Upload profile image</a> -->
        <?php } else { ?>

    <img src="assets/profileimages/" alt="">
        <?php }?>
    </div>
</div>

<?php
include "templates/footer.php";
?>