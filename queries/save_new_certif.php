<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$title = $db->escapeString($_POST['title']);
$content = $db->escapeString($_POST['content']);
$db->select('certificates_templates','*',null,'title="'.$title.'"');
if($db->numRows()==0){
    $db->insert('certificates_templates',array('title'=>$title,'template_content'=>$content,'pubdate'=>date('Y-m-d')));
    $db->getResult();
    $response['msg'] = 'Enregistré avec succés, redirection...';
    $response['state'] = 'ok';
    echo json_encode($response);
}else{
    $response['msg'] = 'Modèle déja existant.';
    $response['state'] = 'exist';
    echo json_encode($response);
}