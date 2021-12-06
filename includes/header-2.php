
<?php if(!isset($_SESSION['user'])):
 // session_start();
 header('Location: login-2.php');
   exit ('Nice try<br>made by CryptedNanomate');
   
// exit();
endif;

?>
<?php
$loggedInUser = selectSingleUser($_SESSION['user']['email']); 
$welcome = 'Welcome '.$loggedInUser['email']. ' '.
$loggedInUser ['type'].' (<a href="logout.php">Logout</a>)';
?>
<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-primary"<?php echo $_SESSION['message']['type']; ?> role="alert">
    <?php echo $_SESSION['message']['msg'];?>
    </div>
    <?php unset($_SESSION['message']);?>
    <?php endif; ?>
    <div class="card">
        <div class="card-body">
    <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
             <i class="fas fa-robot fa-3x ml-2"></i> 
            </div>
        </div>
        <div class="col-md-8 text-right">
            <nav>
                <ul>
                    <li>
                        <a href="index-2.php">Dashboard</a>
                
                    </li>
                    <li>
                        <a href="create.php">Create new user</a>
                
                    </li>
                    <li>
                        <?php echo $welcome ?>                
                    </li>
                </ul>
            </nav>
        </div>
        </div>
