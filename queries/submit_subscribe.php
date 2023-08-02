<?php
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$crypt = new Crypt();
$fname = $db->escapeString($_POST['fname']);
$lname = $db->escapeString($_POST['lname']);
$cin = $db->escapeString($_POST['cin']);
$gender = $db->escapeString($_POST['gender']);
$email = $db->escapeString($_POST['email']);
$tel = $db->escapeString($_POST['tel']);
$institute = $db->escapeString($_POST['institute']);
$username = $db->escapeString($_POST['username']);
$password = $crypt->Encrypt($db->escapeString($_POST['password']));
$errors = '';
$db->select('trainees','*',null,'cin="'.$cin.'"');
$count_cin = $db->numRows();
if($count_cin>0)
    $errors .= 'CIN deja utilisé<br>';
$db->select('trainees','*',null,'email="'.$email.'"');
$count_email = $db->numRows();
if($count_email>0)
    $errors .= 'EMAIL deja utilisé<br>';
$db->select('trainees','*',null,'tel="'.$tel.'"');
$count_tel= $db->numRows();
if($count_tel>0)
    $errors .= 'Numéro GSM deja utilisé<br>';
$db->select('trainees','*',null,'username="'.$username.'"');
$count_username = $db->numRows();
if($count_username>0)
    $errors .= 'Nom d\'utilisateur deja utilisé<br>';
header('Content-type: application/json');
if($errors == ''){
    $db->insert('trainees',array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'cin'=>$cin,'email'=>$email,'tel'=>$tel,'institute'=>$institute,'username'=>$username,'password'=>$password));
    $db->getResult();
    $response['msg'] = 'Inscription transmise avec succés, redirection...';
    $response['state'] = 'ok';
    echo json_encode($response);
}else{
    $response['msg'] = $errors;
    $response['state'] = 'exist';
    echo json_encode($response);
}