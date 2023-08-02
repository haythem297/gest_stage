<?php
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$crypt = new Crypt();
$id = $db->escapeString($_POST['id']);
$type = $db->escapeString($_POST['type_de_stage']);
$db->select('internship_types', '*', null, 'type="' . $type . '" AND id<>' . $id);
$count = $db->numRows();
if ($count > 0) {
    $response['msg'] = 'Type de stage déja existant.';
    $response['state'] = 'exist';
    echo json_encode($response);
} else {
    $db->update('internship_types', array('type'=>$type), 'id=' . $id);
    $db->getResult();
    $response['msg'] = 'Enregistré avec succés, redirection...';
    $response['state'] = 'ok';
    echo json_encode($response);
}
