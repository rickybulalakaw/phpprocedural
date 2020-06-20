<?php

include "functions/postfunctions.php";
include "templates/htmlheader.php";

if(!isset($_GET['param'])){
    echo "You are accessing this page with incomplete parameters";
    return;
}
$param = $_GET['param'];

if(!isset($_GET['id'])){
    echo "You are accessing this page with incomplete parameters";
    return;
}
$searchid = $_GET['id'];

$postsearch = getpostsby($param, $searchid);

switch($param){
    case "tag": 
        $title = "Posts with this tag"; 
    break;
    case "user":
        $title = "Posts from this user";
    break;
    default: 
    $title = "Results from search in posts";
}

print_r($postsearch);

if(mysqli_num_rows($postsearch) < 1){
    echo "<p>No post wihin the search criteria</p>";
    return;
}


?>

<h1><?= $title ?></h1>
<?php foreach($postsearch as $post) {?>
<p><?= $post['title'] ?></p>
<p><?= substr($post['content'],0,1000) ?>... <small><a href="readpost.php?id=<?= $post['id']?>">Read post</a></small></p>
<p><?= $post['timestamp'] ?></p>

<?php $postowner = getpostownername($post['userid']); // getpostownername is a user-built function in functions/postfunctions.php ?>
<p><?= $postowner['firstname'] . " " . $postowner['lastname'] ?></p>
<p><?= $post['tag'] ?></p>
<?php } ?>

<?php include "templates/footer.php"; ?>