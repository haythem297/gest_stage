<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$id = $db->escapeString($_GET['id']);
$db->select('certificates_templates','*',null,'id='.$id);
$template_state = $db->getResult()[0]['state'];
$db->select('certificates_templates','*');
$templates_count = $db->numRows();
$db->select('certificates_templates','max(id)',null,'id<>'.$id);
$last_id = $db->getResult()[0]['max(id)'];
if($template_state==0){
    $db->delete('certificates_templates','id='.$id);
    $db->getResult();
    $response['state']='ok';
    echo json_encode($response);
}else{
    $db->update('certificates_templates',array('state'=>1),'id='.$last_id);
    $db->getResult();
    $db->delete('certificates_templates','id='.$id);
    $db->getResult();
    $response['state']='ok';
    echo json_encode($response);
}