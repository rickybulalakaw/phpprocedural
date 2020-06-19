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

?>
<div class="row">
    <h1>Profile Page</h1>
</div>
<div class="row">
    <div class="col-md-8">
    Last Name: <?= $user['lastname'] ?> <br>
    First Name: <?= $user['firstname'] ?><br>
    Middle Name: <?= $user['middlename'] ?><br>
    Extension: <?= $user['extension'] ?><br>
    Email: <?= $user['email'] ?><br>
    Date of Birth: <?= $user['dateofbirth'] ?><br>

    </div>
    <div class="col-md-4">
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