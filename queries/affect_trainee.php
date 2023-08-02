<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$date_debut = date('Y-m-d',strtotime($db->escapeString($_POST['date_debut'])));
$date_fin = date('Y-m-d',strtotime($db->escapeString($_POST['date_fin'])));
$id=$db->escapeString($_POST['id']);
$type = intval($_POST['type_de_stage']);
$db->insert('attribution_internship',array('id_trainee'=>$id,'date_start'=>$date_debut,'date_end'=>$date_fin,'state'=>1,'id_type'=>$type));
if($db->getResult()){
    $response['msg'] = 'Stage Affecté avec succés, redirection...';
    $response['state'] = 'ok';
    header('Content-type: application/json');
    echo json_encode($response);
}else{
    header('content-type:application/json');
    $response['msg'] = 'Une erreur s\'est produite.';
    $response['state'] = 'error';
    header('Content-type: application/json');
    echo json_encode($response);
}
