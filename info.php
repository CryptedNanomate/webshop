<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    
</body>
</html>
<?php

session_start();
include ('/xampp/htdocs/Tech-Trade/shopping/php/header.php');
include ('/xampp/htdocs/Tech-Trade/shopping/upload/security.php');

$user = array();


if(isset($_SESSION['userID'])){
    require ('/xampp/htdocs/Tech-Trade/shopping/upload/CreateDB.php');
    $user = get_user_info($con, $_SESSION['userID']);
}

?>
<?php echo isset($user['firstName']) ? $user['firstName'] : ''; ?>
<section id="main-site">
    <div class="container py-5">
        <div class="row">
            <div class="col-4 offset-4 shadow py-4">
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($user['profilePicture']) ? $user['profilePicture'] : './assets/profile/beard.png'; ?>" alt="">
                        <h4 class="py-3">
                            <?php
                            if(isset($user['firstName'])){
                                printf('%s %s', $user['firstName'], $user['lastName'] );
                            }
                            ?>
                        </h4>
                    </div>
                </div>

                <div class="user-info px-3">
                    <ul class="font-ubuntu navbar-nav">
                        <li class="nav-link"><b>First Name: </b><span><?php echo isset($user['firstName']) ? $user['firstName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Last Name: </b><span><?php echo isset($user['lastName']) ? $user['lastName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Email: </b><span><?php echo isset($user['email']) ? $user['email'] : ''; ?></span></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>