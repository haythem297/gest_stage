<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$name = $db->escapeString($_POST['name']);
$type = $db->escapeString($_POST['type']);
$tel1 = $db->escapeString($_POST['tel1']);
$tel2 = $db->escapeString($_POST['tel2']);
$fax = $db->escapeString($_POST['fax']);
$email = $db->escapeString($_POST['email']);
$adress = $db->escapeString($_POST['adress']);
$errors = '';
$db->select('scolar_establishment','*',null,'name="'.$name.'"');
$count_name = $db->numRows();
if($count_name>0)
    $errors .= 'Etablissement deja existante<br>';
header('Content-type: application/json');
if($errors == ''){
    $db->insert('scolar_establishment',array('name'=>$name,'tel1'=>$tel1,'tel2'=>$tel2,'fax'=>$fax,'email'=>$email,'adress'=>$adress,'type'=>$type));
    $db->getResult();
    $response['msg'] = 'Enregistré avec succés, redirection...';
    $response['state'] = 'ok';
    echo json_encode($response);
}else{
    $response['msg'] = $errors;
    $response['state'] = 'exist';
    echo json_encode($response);
}