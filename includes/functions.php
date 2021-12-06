<?php
require_once('db.php');
ini_set('memory_limit','16M');
session_start();
?>
<?php 
//formatiranje...
function formatcode($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
//selectovanje...
function selectAll(){
    global $mysqli;
    $data  = array();
    $stmt = $mysqli->prepare('SELECT * FROM employees');
    $stmt->execute();
    $result = $stmt->get_result();
     if($result->num_rows === 0):
        $_SESSION['message'] =  array('type'=>'danger','msg'=>'There are curnetly no records in the database');
     else:
        while($row = $result->fetch_assoc()){
        $data[] = $row;
        }
    endif;
    $stmt ->close();
    return $data;
}
//single...
function selectSingle($id= NULL){
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM employees WHERE id = ?');
    $stmt ->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt ->close();
    return $row;

}
//insertovanje...
function insert($email = NULL, $password = NULL,$confirm_pwd = NULL,$type = NULL,$gender = NULL,$phone = NULL,$adress = NULL){ 
    global $mysqli;
    $stmt = $mysqli ->prepare('INSERT INTO employees (email,password,confirm_pwd,type,gender,phone,adress)VALUES(? , ? , ? , ? , ? , ? , ? )');
    $stmt ->bind_param('sssssss', $email,$password,$confirm_pwd,$type,$gender,$phone,$adress);
       $stmt ->execute();
    $stmt ->close();
    $_SESSION['message'] =  array('type'=>'succes','msg'=>'Succesfuly added selected data');
    header('Location: update.php?id='.$mysqli->insert_id);
    exit();
}
//update...
function update($email = NULL, $password = NULL,$confirm_pwd = NULL,$type = NULL,$gender = NULL,$phone = NULL,$adress = NULL ,$id=NULL){ 
    global $mysqli;
    $stmt = $mysqli ->prepare('UPDATE  employees SET email = ?,password = ?,confirm_pwd = ?,type = ?,gender = ?,phone = ?,adress = ? WHERE id =?');
    $stmt ->bind_param('sssssssi', $email,$password,$confirm_pwd,$type,$gender,$phone,$adress,$id);
       $stmt ->execute();
       if($stmt->affected_rows === 0) :
        $_SESSION['message'] =  array('type'=>'danger','msg'=>'You did not make any changes');
 else:
 $_SESSION['message'] =  array('type'=>'succes','msg'=>'Succesfuly updated selected data');
 endif;

    $stmt ->close();
}

// delete...
function delete($id){ 
    global $mysqli;
    $stmt = $mysqli ->prepare('DELETE FROM  employees  WHERE id =?');
    $stmt ->bind_param('i',$id);
    $stmt ->execute();
    $stmt ->close();
    $_SESSION['message'] =  array('type'=>'succes','msg'=>'Succesfuly deleted selected data');
    header('Location: index-2.php'); 
    exit();
}

//login...
function doLogin($email= NULL,$password=NULL){
    global $mysqli;    
         //$password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare('SELECT * FROM employees WHERE email = ? AND password = ? ');
    $stmt->bind_param('ss',$email,$password);
    $stmt->execute();
    $result = $stmt->get_result();
     if($result->num_rows === 0):
        $_SESSION['message'] =  array('type'=>'danger','msg'=>'Your account has not been enabled');
     else:
    while($row = $result->fetch_assoc()){
        // echo $password;
          if($password == $row['password']) :
        $_SESSION['user']['email'] = $row['email'];
        $_SESSION['user']['password'] = $row['password'];
        $_SESSION['user']['confirm_pwd'] = $row['confirm_pwd'];
        $_SESSION['user']['type'] = $row['type'];
        $_SESSION['user']['gender'] = $row['gender'];
        $_SESSION['user']['level'] = $row['level'];
        if($row['type'] == 'admin'):
       header('Location: index-2.php');
        else:
        header('location: index.php');
        endif;
        else:  
            $_SESSION['message'] =  array('type'=>'succes','msg'=>'Your username or password is incorrect');
    endif;
    }
endif;    
    $stmt ->close();
}

//logout...
function doLogout(){
    unset($_SESSION['user']);
    $_SESSION['message'] =  array('type'=>'success','msg'=>'You have logged out succesfuly ');
    header('Location: login-2.php');
    //   exit();
}  
//single statement...
function selectSingleUser($id=NULL){
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM employees WHERE  id = ? AND email = ? ');
    $stmt ->bind_param('is' , $id,$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt ->close();
    return $row;

}
// registraton..
function createUser($email = NULL, $password = NULL, $confirm_pwd = NULL, $phone = NULL, $adress = NULL, $type = NULL,$gender=NULL,$level = NULL) {
    global $mysqli;
          //  $password = password_hash($password, PASSWORD_DEFAULT);
          $stmt = $mysqli->prepare('SELECT * FROM employees WHERE email = ? ');
          $stmt->bind_param('s',$email);
          $stmt->execute();
          $result = $stmt->get_result();
           if($result->num_rows != 0):
            $_SESSION['message'] =  array('type'=>'danger','msg'=>'That email is taken');
           else:
                $stmt = $mysqli ->prepare('INSERT INTO employees (email,password,confirm_pwd,type,gender,phone,adress,level)VALUES(? , ? , ? , ? ,?, ? , ? , ? )');
                 if($level == NULL):
                 $level = 0;
                 endif;
                $stmt ->bind_param('sssssssi', $email,$password,$confirm_pwd,$type,$gender,$phone,$adress,$level);
                $stmt ->execute();
                $stmt ->close();
                $_SESSION['message'] = array('type'=>'success','msg'=>'Succesfuly registered');
                header('Location: login-2.php');
            endif;
            // exit();
            }
//auth for the end
function auth(){
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM employees WHERE  level = ?');
    if($_SESSION['user']['type'] !== 'admin' && isset($_SESSION['updateBtn'])):
        $_SESSION['message'] =  array('type'=>'danger','msg'=>'You cant do that with that user type');
        header('location login-2.php');
        // die('You cant do that');
    endif;
    if($_SESSION['user']['type'] !== 'admin' && isset($_SESSION['deleteBtn'])):
        $_SESSION['message'] =  array('type'=>'danger','msg'=>'You cant do that with that user type');
        header('location login-2.php');
        // die('You cant do that');
    endif;
    $stmt ->close();
   
}

function createUserr($user_adress = NULL,$product_name = NULL){
    global $mysqli;
                $stmt = $mysqli ->prepare('INSERT INTO employees (user_adress,product_name)VALUES(? , ?)');
                $stmt ->bind_param('ss', $user_adress,$product_name);
                $stmt ->execute();
                $stmt ->close();
                $_SESSION['message'] = array('type'=>'success','msg'=>'Succesfuly registered');
                header('Location: index.php.php');
        }
        function validate_input_text($textValue){
            if (!empty($textValue)){
                $trim_text = trim($textValue);
                $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
                return $sanitize_str;
            }
            return '';
        }
        
        function validate_input_email($emailValue){
            if (!empty($emailValue)){
                $trim_text = trim($emailValue);
                // remove illegal character
                $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
                return $sanitize_str;
            }
            return '';
        }
        