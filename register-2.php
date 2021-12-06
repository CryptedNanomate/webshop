<?php
    include('includes/functions.php');
    if(isset($_POST['btnRegister'])):
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_pwd = $_POST['confirm_pwd'];
        $type = $_POST['type'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $adress = $_POST['adress'];       
        createUser($email, $password, $confirm_pwd,$type, $gender,$phone,$adress);
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <?php include('/xampp/htdocs/Tech-Trade/shopping/php/header.php') ?>
    <?php include('/xampp/htdocs/Tech-Trade/shopping/theme/header-scripts.php'); ?>
</head>
<body>
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
            <?php echo $_SESSION['message']['msg']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?> 

    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
            <form action=""  method="POST" class="register" id="reg-form" class="form">
            
<div class="row">
        <div class="ml-5 col-md-4 ">
            <label for="email" >E-Mail</label>
            <input required type="email" name="email" id="email" class="form-control email" value="">
<br>
        </div>
         <div class="ml-2 col-md-4">
<label for="password">Password</label>
<input type="password" required name="password" id="password" class="form-control password" value="">
<br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4 ml-5">
<label for="confirm_pwd">Confirm Password</label>
<input type="password" required name="confirm_pwd" id="confirm_pwd" class="form-control confirm_pwd" value="">
<small id="confirm_error" class="text-danger">
                    </small> 
<br>
</div>
<br><div class="col-md-4 ">
<label for="phone">Phone</label>
<input type="text" required id="phone" name="phone" class="form-control" class="phone"  value="">
</div>
</div>
<div class="row">
<div class="col-md-4 ml-5">
<label for="adress">Adress</label>
<input type="text" required name="adress" id="adress" class="form-control adress" value="">
<br>
</div>  
<div class="col-md-2 mt-5">
<label for="type">Type</label>
    <select name="type" value = "" class= >
    <option value="admin"  id="">admin</option>
    <option value="normal-user" id="" >normal user</option>
</select>
<br>
</div>
<div class="col-md-2 mr-2 mt-5">
<label for="">Gender</label>
<select name="gender" id="" value = "">
    <option value="male" id="">male</option>
    <option value="female" id="">female</option>
</select>
</div>

</div>
<button name="btnRegister" class="col-md-1 ml-5 mt-2 btn btn-primary">Register</button><a href="./login-2.php" class="ml-3">Cancel</a> <br><p class="mt-5 ml-4 ml-3">By clicking register u automaticly agree to termes of use that can be seen<a href=""> here</a></p>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>

 $('.phone').mask('000-000-0000');
 $('.form').validate({
 rules:{
   email:{
         required:true
     },
     password:{
         required:true,
         minlength:5,
     },
     confirm_pwd:{
         required:true,
         minlength:5,
     },
     adress:{
         required:true,
         minlength:3,
     },
     phone:{
         minlength: 6,
     }
  
 },messages:{
     email:'E-mail must be in e-mail format and it is required!',
    password:'Passord must be at least 5 charachters long',
     confirm_pwd:'Confirmed password must be same as entered password',
     phone: {
         minlength:jQuery.validator.format('Phone number must be at least {0} charachters long')
     }
 },
 errorClass:'is-invalid text-danger',
 });

// </script>
<script>
$('.form').validate({
    event: () => {
        // alert("aca");
    }
})
$("#reg-form").submit(function (event) {
    let $password = $("#password");
    let $confirm = $("#confirm_pwd");
    let $error = $("#confirm_error");
    // alert($confirm.value);
    if($password.val() === $confirm.val()){
    return true;
    }else{
    $error.text("Passwords do not Match");
    event.preventDefault();
    }
    });
   </script>  
</body>
</html>
</body>
</html>

