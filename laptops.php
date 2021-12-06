<?php
session_start();
require_once ('/xampp/htdocs/Tech-Trade/shopping/CreateDB.php');
require_once ('/xampp/htdocs/Tech-Trade/shopping/php/component.php');
// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])){
    print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Vec ste dodali ovaj proizvod!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Trade</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css ">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="css2.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php
include("/xampp/htdocs/Tech-Trade/shopping/php/header.php");


?>
<div class="container border border-dark">
    <div class="row text-center py-5">
     <?php
    $result = $database->get_data();
    while($row = mysqli_fetch_assoc($result))
    {       
        if(strpos($row['product_name'],'Laptop')){
            component($row['product_name'],$row['product_price'],$row['product_image'],$row['price_before'],$row['product_description'],$row['id']);         
        }
    }
    ?>
    </div>
</div>

</body>
</html>
