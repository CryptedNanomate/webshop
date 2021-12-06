<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="css2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   

    
</head>
<body>
    <?php
    include('/xampp/htdocs/Tech-Trade/shopping/php/header.php')
    ?>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        require("register-process.php");
    }   
    ?>
<!-- area -->
 <main id="main-area">
 <section id="register">
<div class="row m-0">
    <div class="col-lg-4 offset-lg-2 ">
       <div class="text-center pb-5">
       <h1 class="login-tittle text-dark">Register</h1>
        <p class="p-1 m-0 font-ubuntu text-black-50">Register and enable aditional features</p>
        <span class="font-ubuntu text-black-50">If you already have an account log in  <a href="login.php">here</a></span>
       </div>
       <div class="upload-profile-picture d-flex justify-content-center pb-5">  
           <div class="text-center">
                <div class="d-flex justify-content-center">
                    <img class="camera-icon" src="camera-solid.svg" alt="camera">
                </div>
                <img src="beard.png"  style="width:200px; height:200px" class="img rounded-circle" alt="">
                <small class="form-text text-black-50">Choose your profile picture</small>
                <input type="file" form="reg-form" class="form-control-file" name="profileUpload" id="upload-profile">
           </div>
       </div>
       <div class="d-flex justify-content-center">
           <form action="register.php" method="POST" enctype="multipart/form-data" id="reg-form">
            <div class="form-row">
                <div class="col">
                    <input type="text" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" name="firstName" id="firstName" class="form-control" placeholder="First Name">
                </div>
                <div class="col">
                    <input type="text" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="form-row my-4">
                <div class="col">
                    <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="E-mail*">
                </div>
            </div>
            <div class="form-row my-4">
                <div class="col">
                    <input type="password" required name="password" id="password" class="form-control" placeholder="Password*">
                </div>
            </div>
            <div class="form-row my-4"> 
                <div class="col">
                    <input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control" placeholder="Confirm Password*">
                    <small id="confirm_error" class="text-danger">
                    </small>                   
 <script>
  
  $(document).ready(function (e) {

let $uploadfile = $('#register .upload-profile-picture input[type="file"]');


$uploadfile.change(function () {
readURL(this);
});

$("#reg-form").submit(function (event) {
let $password = $("#password");
let $confirm = $("#confirm_pwd");
let $error = $("#confirm_error");
if($password.val() === $confirm.val()){
return true;
}else{
$error.text("Passwords do not Match");
event.preventDefault();
}
});
});

function readURL(input) {
if(input.files && input.files[0]){
let reader = new FileReader();
reader.onload = function (e) {
$("#register .upload-profile-picture .img").attr('src', e.target.result);
$("#register .upload-profile-picture .camera-icon").css({display: "none"});
}

reader.readAsDataURL(input.files[0]);

}
}


</script> 
                </div>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="agreement" class="form-check-input" required>
                <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree  to <a href="#">these terms of use</a></label>
            </div>
            <div class="submit-btn text-center my-5">
                <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Countinue</button>
            </div>
           </form>
       </div>
    </div>
</div>

</section>

<?php
include('/xampp/htdocs/Tech-Trade/shopping/upload/footer.php')
?>


