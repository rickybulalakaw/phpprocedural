<?php 

session_start();
include "config/db.php";
include "templates/htmlheader.php";
include "functions/systemfunctions.php";
checksignin();

$userid = $_SESSION['id'];

$getprofile = "select * from user where id = $userid";
$result = mysqli_query($db, $getprofile);

$user = mysqli_fetch_assoc($result);

?>
<div class="row">
    <div class="col-md-6 offset-md-2">
        <h1>My Profile</h1>
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

    </div>
    <div class="col-md-2">
        <?php if($user['imageid'] == "") { ?>
            <form action="uploadprofilepic.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" class="form-control">
                <br>
                <input type="submit" name="upload" value="Upload" class="btn btn-danger btn-sm">
            </form>
            
        <?php } else { ?>

        <img class="img-fluid max-width: 100% height: auto" src="assets/profileimages/<?= $user['imageid'] ?>" alt="myprofilepic">
        <?php }?>
    </div>
</div>




<?php include "templates/footer.php"; ?>