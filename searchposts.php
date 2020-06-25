<?php
session_start();
include "functions/postfunctions.php";
include "templates/htmlheader.php";
include "functions/tagfunctions.php";

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



switch($param){
    case "tag": 
        $title = "Posts with this tag"; 
    break;
    case "userid":
        $title = "Posts from this user";
    break;
    default: 
    $title = "Results from search in posts";
}

$results_per_page = 5;

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page-1)*$results_per_page;

$postsearch = getpostsby($param, $searchid, $start_from, $results_per_page);

// print_r($postsearch);

if(mysqli_num_rows($postsearch) < 1){
    
    switch($param){
        case "tag": 
            echo "<p>No post within the search criteria</p>";
        break;
        case "userid":
            echo "<p>This user currently has no posts yet.</p>";
        break;
        default: 
        $title = "No post within the search criteria";
    }

    return;
}


?>

<h1><?= $title ?></h1>
<?php foreach($postsearch as $post) {?>
<div class="row">
    <div class="col border border-success">

        <h1><?= $post['title'] ?></h1>
        <?php $postowner = getpostownername($post['userid']); // getpostownername is a user-built function in functions/postfunctions.php ?>
        <small><?= $postowner['firstname'] . " " . $postowner['lastname'] ?> on 
        <?= $post['timestamp'] ?> tagged under <?php $tagname = gettagname($post['tag']); echo $tagname; ?></small>
        <p><?= substr($post['content'],0,1000) ?>... <small><a href="readpost.php?id=<?= $post['id']?>">Read post</a></small></p>
        
        <!-- <p><?php $tagname = gettagname($post['tag']); echo $tagname; ?></p> -->
    </div>
</div>
<br>
<?php } ?>

<?php 


        $row = mysqli_num_rows($postsearch);

        $total_pages = ceil($row / $results_per_page);

        for ($i=1; $i<=$total_pages; $i++) 
            {  // print links for all pages
                    echo "<a class='btn btn-primary' href='index.php?page=".$i."'";
                    if ($i==$page)  echo " class='curPage'";
                    echo ">".$i."</a> ";
            };

        // print_r($row);
        // echo $row;




?>

<?php include "templates/footer.php"; ?>