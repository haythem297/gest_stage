<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$title = $db->escapeString($_POST['title']);
$content = $db->escapeString($_POST['content']);
$id = $_POST['id'];
$db->select('certificates_templates','*',null,'title="'.$title.'" AND id <>'.$id);
if($db->numRows()==0){
    $db->update('certificates_templates',array('title'=>$title,'template_content'=>$content),'id='.$id);
    $db->getResult();
    $response['msg'] = 'Enregistré avec succés, redirection...';
    $response['state'] = 'ok';
    echo json_encode($response);
}else{
    $response['msg'] = 'Modèle déja existant.';
    $response['state'] = 'exist';
    echo json_encode($response);
}