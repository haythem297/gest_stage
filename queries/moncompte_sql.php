<?php
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$cr = new Crypt();
$id=$_SESSION['user']['id'];
$email = $_POST['email'];
if($_POST['password']==''){
    $arr=array('email'=>$email);
    $db->update('users',$arr,'id='.$_SESSION['user']['id']);
    $db->getResult();
    $_SESSION['user']['email'] = $_POST['email'];
    $response['msg'] = 'ok';
    header('Content-Type:application/json');
    echo json_encode($response);
}else{
    $arr=array('email'=>$email,'password'=>$cr->Encrypt($_POST['password']));
    $db->update('users',$arr,'id='.$_SESSION['user']['id']);
    $db->getResult();
    $_SESSION['user']['email'] = $_POST['email'];
    $response['msg'] = 'ok';
    header('Content-Type:application/json');
    echo json_encode($response);
}