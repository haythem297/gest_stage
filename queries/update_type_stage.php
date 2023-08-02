<?php
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$id = $db->escapeString($_POST['id']);
    $array = array('type_de_stage'=>$type_de_stage));
$db->update('type_stage',$array,'id='.$id);
$db->getResult();
$response['msg'] = 'Enregistré avec succés, redirection...';
$response['state'] = 'ok';
echo json_encode($response);