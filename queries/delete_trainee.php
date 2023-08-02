<?php
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$crypt = new Crypt();
$id = $db->escapeString($_GET['id']);
$db->delete('trainees','id='.$id);
header('Content-type: application/json');
$response = [];
if($db->getResult()){
    $response['msg']='ok';
    echo json_encode($response);
}else{
    $response['msg']='error';
    echo json_encode($response);
}