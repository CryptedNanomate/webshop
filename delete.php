<?php
include ('/xampp/htdocs/Tech-Trade/shopping/includes/functions.php');
$user = (isset($_GET['id'])) ? delete(($_GET['id'])) :
exit();
?>