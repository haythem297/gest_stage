<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$type = $db->escapeString($_POST['type_de_stage']);
$db->select('internship_types', '*', null, 'type="' . $type . '"');
$count = $db->numRows();
if ($count > 0) {
    $response['msg'] = 'Type de stage déja existant.';
    $response['state'] = 'exist';
    header('Content-type: application/json');
    echo json_encode($response);
} else {
    $db->insert('internship_types', array('type' => $type));
    $db->getResult();
    $response['msg'] = 'Enregistré avec succés, redirection...';
    $response['state'] = 'ok';
    header('Content-type: application/json');
    echo json_encode($response);
}
