<?php
include ('../shopping/includes/functions.php');
if(isset($_POST['btninsert'])) :
insert($_POST['email'],$_POST['password'],$_POST['confirm_pwd'],$_POST['type'],$_POST['gender'],$_POST['phone'],$_POST['adress']);
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
<?php include('/xampp/htdocs/Tech-Trade/shopping/theme/header-scripts.php');
include('/xampp/htdocs/Tech-Trade/shopping/includes/header-2.php');
?>
<div class="container-fluid">
<h1><em class="fa fa-plus-circle"></em> insert</h1>
<form action="" method="POST" class="form">
<div class="row">
        <div class="ml-2 col-md-6">
            <label for="">E-Mail</label>
            <input type="email" name="email" id="email" class="form-control email" value="">
<br>
        </div>
    </div>
    <div class="row">
            <div class="ml-2 col-md-6">
<label for="">Password</label>
<input type="password" name="password" id="password" class="form-control password" value="">
<br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
<label for="">Confirm Password</label>
<input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control confirm_pwd" value="">
<br>
</div>
</div>
<div class="row">
<br><div class="col-md-6">
<label for="">Phone</label>
<input type="text" id="phone" name="phone" class="form-control phone" value="">
</div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
<label for="">Adress</label>
<input type="text" name="adress" id="adress" class="form-control adress" value="">
<br>
</div>
<div class="row">
<div class="col-md-5">
<label for="">Type</label>
<select name="type" value = "" class= >
    <option value="admin" id="">admin</option>
    <option value="normal-user" id="" >normal user</option>
</select>
<br>
</div>
</div>
<div class="col-md-1">
<label for="">Gender</label>
<select name="gender" id="" value = "">
    <option value="male" id="">male</option>
    <option value="female" id="">female</option>
</select>
</div>
</div>
</div>
<button name="btninsert" class="col-md-5 ml-3 mt-2 btn btn-primary">Insert record</button>
</form>
<?php include('/xampp/htdocs/Tech-Trade/shopping/theme/footer-scripts.php');?>
  <script src="validation.js"></script>  
</body>
</html>