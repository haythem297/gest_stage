<?php
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$crypt = new Crypt();
$fname = $db->escapeString($_POST['fname']); 
$lname = $db->escapeString($_POST['lname']); 
$gender = $db->escapeString($_POST['gender']); 
$cin = $db->escapeString($_POST['cin']); 
$email = $db->escapeString($_POST['email']); 
$tel = $db->escapeString($_POST['tel']); 
$institute = $db->escapeString($_POST['institute']); 
$username = $db->escapeString($_POST['username']); 
$password = $db->escapeString($_POST['password']);  
$id = $db->escapeString($_POST['id']);
if($password!=''){
    $array = array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'cin'=>$cin,'email'=>$email,'tel'=>$tel,'institute'=>$institute,'username'=>$username,'password'=>$crypt->Encrypt($password));
}else{
    $array = array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'cin'=>$cin,'email'=>$email,'tel'=>$tel,'institute'=>$institute,'username'=>$username);
}
$db->update('trainees',$array,'id='.$id);
$db->getResult();
$response['msg'] = 'Enregistré avec succés, redirection...';
$response['state'] = 'ok';
echo json_encode($response);