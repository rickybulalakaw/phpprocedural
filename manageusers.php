<?php 
session_start();
include "config/db.php";
include "templates/htmlheader.php";
include "functions/systemfunctions.php";
checksignin();
?>

<?php 

// if(!isset($_SESSION['signin_success'])){
//     echo "This page can only be accessed by registered users.";
//     return;
// }

// if(!isset($_SESSION['admin'])){
//     echo "This page can only be accessed by System Administrators.";
//     return;
// }

?>

<h1 class="text-center">User Management Page</h1>
<?php 

$countvalidated = "SELECT * from user where status = 'Validated'";
$process3 = mysqli_query($db, $countvalidated);
$row = mysqli_fetch_assoc($process3);

if($row >= 1){ ?>

<table class="table table-striped">
    <thead>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Extension</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <?php foreach($process3 as $user) { ?>
    <tr>
        <td><?= $user['firstname'] ?></td>
        <td><?= $user['middlename'] ?></td>
        <td><?= $user['lastname'] ?></td>
        <td><?= $user['extension'] ?></td>
        <td><?= $user['dateofbirth'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><a class="btn btn-success btn-sm" href="activateuser.php?id=<?= $user['id'] ?>">Activate</a></td>
    </tr>
    <?php } ?>

</table>
<?php } else {
    echo "Congratulations! All users have been validated.";
} ?>

<?php 
include "templates/footer.php";
?>