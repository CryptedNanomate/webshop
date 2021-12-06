<?php
include ('/xampp/htdocs/Tech-Trade/shopping/update.php');
if(isset($_POST['btnUpdate'])) :
 update($_POST['email'],$_POST['password'],$_POST['confirm_pwd'],$_POST['type'],$_POST['gender'],$_POST['phone'],$_POST['adress']);
endif;
$user = (isset($_GET['id'])) ? selectSingle($_GET['id']) : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    
    <?php
include('/xampp/htdocs/Tech-Trade/shopping/theme/header-scripts.php');
include('/xampp/htdocs/Tech-Trade/shopping/includes/header-2.php');
?>
</head>
<body>
<?php if ($user !=false): ?>
<div class="container-fluid"></div>
<h1><em class="fa fa-pen-square"></em> Update</h1>
<form action="" method="POST" class="form " >
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <div class="row">
        <div class="ml-2 col-md-6">
            <label for="">E-Mail</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo $user ['email'] ?>">
<br>
        </div>
    </div>
    <div class="row">
            <div class="ml-2 col-md-6">
<label for="">Password</label>
<input type="password" name="password" id="password" class="form-control" value="<?php echo $user ['password'] ?>">
<br>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 ml-2">
<label for="">Confirm Password</label>
<input type="password" name="confirm_pwd" id="confirm_pwd" class="form-control" value="<?php echo $user ['confirm_pwd'] ?>">
<br>
</div>
</div>
<div class="row">
<br><div class="col-md-6 ml-2">
<label for="">Phone</label>
<input  type="text" id="email" name="phone" class="form-control phone" value="<?php echo $user ['email'] ?>">
</div>
</div>
<br>
<div class="row">
    <div class="col-md-6 ml-2">
<label for="">Adress</label>
<input type="text" name="adress" class="form-control" value="<?php echo $user ['adress'] ?>">
<br>
</div>
<div class="row">
<div class="col-md-5">
<label for="">Type</label>
<select name="type" value = "" class= >
    <option value="<?php echo $user ['type'] ?>" id="">admin</option>
    <option value="<?php echo $user ['type'] ?>" id="" >normal user</option>
</select>
<br>
</div>
</div>
<div class="col-md-1">
<label for="">Gender</label>
<select name="gender" id="" value = "">
    <option value="<?php echo $user ['gender'] ?>" id="">male</option>
    <option value="<?php echo $user ['gender'] ?>" id="">female</option>
</select>
</div>
</div>
</div>
<button class="col-md-5 mt-5 ml-2 btn btn-primary" name="btnUpdate">update record</button>
</form>
<?php else: ?>
<h1>User is not set</h1>
<?php endif; ?>
<?php
include('/xampp/htdocs/Tech-Trade/shopping/theme/footer-scripts.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
 <script src="../New folder/validation.js"></script> 
</script>
</body>
</html>