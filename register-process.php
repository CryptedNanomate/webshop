<?php

require ('./security.php');

// error variable.
$error = array();

$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)){
    $error[] = "You havent  entered your first Name";
}

$lastName = validate_input_text($_POST['lastName']);
if (empty($lastName)){
    $error[] = "You havent entered your Last Name";
}

$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You havent entered your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You havent entered your password";
}

$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)){
    $error[] = "You havent entered your Confirm Password";
}

$files = $_FILES['profileUpload'];
$profilePicture = upload_profile('./assets/New folder/', $files);



if(empty($error)){
    // register a new user
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    require ('/xampp/htdocs/Tech-Trade/shopping/upload/CreateDB.php');

    // make a query
    $query = "INSERT INTO user (userID, firstName, lastName, email, password, profilePicture, registerDate )";
    $query .= "VALUES(' ', ?, ?, ?, ?, ?, NOW())";

    // initialize a statement
    $q = mysqli_stmt_init($con);

    // prepare sql statement
    mysqli_stmt_prepare($q, $query);

    // bind values
    mysqli_stmt_bind_param($q, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profilePicture);


    // execute statement
    mysqli_stmt_execute($q);

    if(mysqli_stmt_affected_rows($q) == 1){
         echo 'recorded succesfuly';
        // start a new session
         session_start();

    
         $_SESSION['userID'] = mysqli_insert_id($con);


         header('location:login.php');
         exit();
    }else{
        print "Error while registration...!";
    }

}else{
    echo 'not validate';
}   