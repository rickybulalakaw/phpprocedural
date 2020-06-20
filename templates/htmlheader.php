<?php 

include "./config/env.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <title>Knowledge System</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Knowledge and Information Sharing System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(!isset($_SESSION['signin_success'])){ ?>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="privacy.php">Register <span class="sr-only">(current)</span></a>
      </li>
      <?php } else { ?>

      <?php if($_SESSION['usertype'] == "Admin") { ?>

      <li class="nav-item active">
        <a class="nav-link" href="manageusers.php">Manage Users <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?> <!-- Closes the if(isset($_SESSION['admin'])) bracket -->

      <li class="nav-item active">
        <a class="nav-link" href="post.php">Add Post <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="myprofile.php">My Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logoff.php">Log Out <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?> <!-- Closes the else bracket -->
    </ul> 
    <form class="form-inline my-2 my-lg-0" method="get" action="searchposts.php">
      <input name="param" value = "post" hidden>
      <input class="form-control mr-sm-2" type="search" placeholder="Search posts content" name="id" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container-fluid">

    
