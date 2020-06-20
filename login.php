<?php 
include "config/db.php";
include "templates/htmlheader.php";
session_start();    

if(isset($_POST['login'])){

    $email =  $_POST['email'];
    $password =  $_POST['password'];

    $sql = "select * from user where email = ? and status = 'Active'";

    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "s", $email);        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        // Put data into return variable 
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) != NULL){
            $row = mysqli_fetch_assoc($result);

        // compare password submission through password_verify

        // $password 

        $dbpassword = $row['password'];

        if(password_verify($password, $dbpassword) == TRUE){

            // Set session variables

            $_SESSION['signin_success'] = "signin_success";
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['middlename'] = $row['middlename'];
            $_SESSION['extension'] = $row['extension'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['usertype'] = $row['usertype'];

            // Redirect to home page

            header("Location: index.php");

        } else {
            echo "Sorry. You have entered invalid credentials.";
            return;
        }

    }
}
}
?>
<div class="col-md-4 offset-md-4">
    <form action="login.php" method="post">
        <label>Email</label>
        <input type="email" name="email" required autofocus class="form-control">
    
        <label>Password</label>
        <input type="password" name="password" required autofocus class="form-control">
    
        <br>
        <input type="submit" name="login" value="Log in" class="btn btn-primary form-control">
    </form>
</div>

<?php include "templates/footer.php" ?>