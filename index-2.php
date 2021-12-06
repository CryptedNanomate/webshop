<?php
include ('/xampp/htdocs/Tech-Trade/shopping/includes/functions.php');
 $allEmployes = selectAll();
//  auth();
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
    <?php include('/xampp/htdocs/Tech-Trade/shopping/includes/header-2.php') ?>
    <?php include('/xampp/htdocs/Tech-Trade/shopping/theme/header-scripts.php') ?>
    <div class="container-fluid">
    <h1><em class="fa fa-check-circle">Welcome to admin panel of Tech-Trade</h1></em>
    <table class="table" id="myTable">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search me..">
        <thead>
            <tr class="header">
                <th>id</th>
                <th>Email</th>
                <th>Password</th>
                <th>Confirmed Password</th>
                <th>Type</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Adress</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
   <?php  error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
</div>
<?php
include('/xampp/htdocs/Tech-Trade/shopping/theme/footer-scripts.php')
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./js/init.js"></script>
</script>
</body>
</html>