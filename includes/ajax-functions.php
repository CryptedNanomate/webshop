<?php
if(isset($_GET['function']) && $_GET["function"] === "selectAll"){
    selectAll();
}

require_once('/xampp/htdocs/New folder/includes/db.php');

//selectovanje...
function insert($email = NULL, $password = NULL,$confirm_pwd = NULL,$type = NULL,$gender = NULL,$phone = NULL,$adress = NULL){ 
    global $mysqli;
    $stmt = $mysqli ->prepare('INSERT INTO employees (email,password,confirm_pwd,type,gender,phone,adress)VALUES(? , ? , ? , ? , ? , ? , ? )');
    $stmt ->bind_param('sssssss', $email,$password,$confirm_pwd,$type,$gender,$phone,$adress);
    $stmt ->execute();
    $stmt ->close();
    header('Location: update.php?id='.$mysqli->insert_id);   

    $stmt ->close();
}

?>