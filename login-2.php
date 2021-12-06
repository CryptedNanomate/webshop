<?php
include ('/xampp/htdocs/Tech-Trade/shopping/includes/functions.php');
if(isset($_POST['btnLogin'])):
$email= $_POST['email'];
$password = $_POST['password']; 
doLogin($email,$password);
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <?php include('/xampp/htdocs/Tech-Trade/shopping/theme/header-scripts.php') ?>
</head>
<body>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
   <?php include('/xampp/htdocs/Tech-Trade/shopping/php/header.php') ?>
    <!-- <h1>ssadas</h1> -->
    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-primary"<?php echo $_SESSION['message']['type']; ?> role="alert">
    <?php echo $_SESSION['message']['msg'];?>
    </div>
    <?php unset($_SESSION['message']);?>
    <?php endif; ?>
    <div class="container main">
    <div class="card">
    <div class="card-body">
        <form class="login" action="" method="POST">
            <div class="row mt-5">
            <div class="col-md-5 mt-5 offset-2 "> 
            <label for="email" class="mt-5">Email</label>
            <input value="" type="text" name="email" id="email" class="form-control">
            </div>
            </div>
            <div class="row">
            <div class="col-md-5 offset-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            </div>
            </div>
            <div class="col-5 offset-2 mt-5">
            <button name="btnLogin" class="btn btn-dark">Login</button><a href="register-2.php">Register</a>
            </div>
        </form>
        
        </div>
    </div>
<?php
include('/xampp/htdocs/Tech-Trade/shopping/theme/footer-scripts.php')
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../Tech-Trade//shopping//js//init.js"></script>
</script>
</body>
</html>