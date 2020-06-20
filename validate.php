<?php 

include "config/db.php";
include "templates/htmlheader.php";

if(!isset($_GET['hash'])){
    echo "Sorry, you are trying to access this page with incomplete parameters.";
    return;
} 

$hash = $_GET['hash'];

// search for hash value from database

$searchhash = "select * from user where validationlink = '$hash'";
$process = mysqli_query($db, $searchhash);

$row = mysqli_fetch_assoc($process);

if($row == null){
    echo "The link is not valid.";
    return;
}

$id = $row['id'];

$updaterecord = "UPDATE user SET status='Validated' WHERE id = $id";
$gawinna = mysqli_query($db, $updaterecord);

?>

<p>Congratulations! Your email has been validated.</p>
<p>Please wait for a confirmation email from the System Administrator that your account has been activated.</p>

<?php include "templates/footer.php" ?>