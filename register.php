<?php 
include "config/db.php";
include "templates/header.php";
include "config/env.php";
// include "mailer.php";

if(isset($_POST['submit'])){

    // cleans string inputs

    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
    $extension = mysqli_real_escape_string($db, $_POST['extension']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    $privacy = mysqli_real_escape_string($db, "Yes");

    // checks that the email address is not yet registered

    $checkemail = "select * from user where email = '$email'";
    $result = mysqli_query($db, $checkemail);
    $row = mysqli_fetch_row($result);
    if($row >= 1){
        echo "That email is already in use. Please use another email address.";
        return;
    }

    // checks if the password is 

    if($password != $password2){
        echo "The values in the Password and Confirm Password fields are not the same. Please make sure it is the same.";
        return;
    }

    $enc_pass = password_hash($password, PASSWORD_DEFAULT);

    $enc_salt = "khdf;awiur398q23urjf; lasjdjsda;fljapto8j;lskjgpoarj;lkjl;tjkl";
    $useridentifier = $email.$enc_salt;
    $validationlink = sha1($useridentifier);

    $sql = "INSERT INTO user(email, password, firstname, middlename, lastname, extension, dateofbirth, privacyagreement, validationlink) VALUES (?,?,?,?,?,?,?,?,?)";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($db);

    // Prepare the statement
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL Statement Failed.";
        return;
    } else {
        // Bind parameters to the placeholders
        mysqli_stmt_bind_param($stmt, "ssssssdss", $email, $enc_pass, $firstname, $middlename, $lastname, $extension, $dob, $privacy, $validationlink);        // Run parameters inside database 
        mysqli_stmt_execute($stmt);

        // Send validation email 

        $to = $email;
        $subject = "Email Validation Link";

        // $message = "
        // <html>
        // <head>
        // <title>HTML email</title>
        // </head>
        // <body>
        // <p>This email contains HTML Tags!</p>
        // Hello New user. Please click this link to validate your ownership of your email address: <br><br>
        // $localhost/validate.php?hash=$validationlink <br>
        // Thank you. <br><br>
        // System Developers
        // </body>
        // </html>
        // ";

        $message = "Please click this link: $localhost/validate.php?hash=$validationlink ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: bayambangsystems@gmail.com' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        if(mail($to,$subject,$message,$headers)){ // in order for this to work, you need to make some editions to your local XAMPP settings. 
            header("Location: registrationsuccess.php");
        } else {
            echo "Error";
        }

   

        // $result = mysqli_stmt_get_result($stmt);
        // if(mysqli_num_rows($result) >= 1){
        //     echo "Please check the barcode you entered as the data you entered is already in the system.<br /><br />";                
        //     echo "Please click Back on your browser.";                
        //     return;
        // } 



    }



}


?>

<div class="col-md-6 offset-md-3">

<?php 
    if(!isset($_GET['privacy'])){
        // if($_GET['privacy'] != 'yes'){
        //     echo "You may not register until you agree with the privacy notice described <a href='privacy.php'>here</a>.";    
        //     return;
        // } // Fix for Ensuring Yes
        echo "You may not register until you agree with the privacy notice described <a href='privacy.php'>here</a>.";    
        return;
        
    } 

    ?>

    <h1>Registration Page</h1>

    <form action="register.php" method="post">
        <label>Last Name</label>
        <input type="text" name="lastname" class="form-control" autofocus required>

        <label>First Name</label>
        <input type="text" name="firstname" class="form-control" autofocus required>

        <label>Middle Name</label>
        <input type="text" name="middlename" class="form-control" autofocus required>

        <label>Extension</label>
        <input type="text" name="extension" class="form-control" autofocus required>

        <label>Date of Birth</label>
        <input type="date" name="dob" class="form-control" required>

        <label>Email</label>
        <input type="email" name="email" class="form-control" autofocus required>

        <label>Password</label>
        <input type="password" name="password" class="form-control" autofocus required>

        <label>Confirm Password</label>
        <input type="password" name="password2" class="form-control" autofocus required>

        <br>


        <input class="btn btn-primary form-control" type="submit" name="submit" value="Register">


    </form>
</div>
<?php include "templates/footer.php"; ?>