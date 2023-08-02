<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$id = $db->escapeString($_GET['id']);
$db->delete('scolar_establishment','id='.$id);
header('Content-type: application/json');
$response = [];
if($db->getResult()){
    $response['msg']='ok';
    echo json_encode($response);
}else{
    $response['msg']='error';
    echo json_encode($response);
}