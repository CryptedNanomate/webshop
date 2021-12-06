<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./shopping//upload/css2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    
</head>
<body>
<?php
session_start();
// header.php
include ('/xampp/htdocs/Tech-Trade/shopping/php/header.php');
include ('./security.php')
?>
<?php
    $user = array();
    require ('mysqli_connect.php');

    if(isset($_SESSION['userID'])){
        $user = get_user_info($con, $_SESSION['userID']);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require ('login-process.php');
    }
?>



<!-- area -->
 <main id="main-area">
 <section id="login-form">
<div class="row m-0">
    <div class="col-lg-4 offset-lg-2 ">
       <div class="text-center pb-5">
       <h1 class="login-tittle text-dark">Login</h1>
        <p class="p-1 m-0 font-ubuntu text-black-50">Login here</p>
        <span class="font-ubuntu text-black-50">Create a new <a href="register.php">account</a></span>
       </div>
       <div class="upload-profile-picture d-flex justify-content-center pb-5">  
           <div class="text-center">
           <img src="<?php echo isset($user['profilePicture'])? $user['profilePicture']: 'beard.png"';?>  style="width:200px; height:200px" class="img rounded-circle" alt="">
           </div>
       </div>
       <div class="d-flex justify-content-center">
           <form action="login.php" method="POST" enctype="multipart/form-data" id="log-form">
            </div>
            <div class="form-row my-4">
                <div class="col">
                    <input type="email"  required name="email" id="email" class="form-control" placeholder="E-mail*">
                </div>
            </div>
            <div class="form-row my-4">
                    <div class="col">
                    <input type="password" required name="password" id="password" class="form-control" placeholder="Password*">
                </div>
            </div>
                           
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


