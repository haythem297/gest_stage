<?php 
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$crypt = new Crypt();
$username = $db->escapeString($_POST['username']);
$password = $crypt->Encrypt($db->escapeString($_POST['password']));
$db->select('users','id,fname,lname,username,email,role',null,'username="'.$username.'" AND password="'.$password.'"');
$count = $db->numRows();
if($count>0){
    $result = $db->getResult()[0];
    $_SESSION['user'] = $result;
    echo json_encode('ok');
}else{
    echo json_encode('verif');
}