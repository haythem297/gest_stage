<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$id = $db->escapeString($_GET['id']);
$db->update('certificates_templates',array('state'=>0),'id<>'.$id);
$db->getResult();
$db->update('certificates_templates',array('state'=>1),'id='.$id);
$db->getResult();
$response['state'] = 'ok';
echo json_encode($response);