<?php
session_start();
include('../includes/Database.php');
$db = new Database();

$db->select('attribution_internship','*',null,'id_type=1');
$ouvriers = $db->numRows();

$db->select('attribution_internship','*',null,'id_type=2');
$techniciens = $db->numRows();
$response['msg']='ok';
$response['ouvriers']=$ouvriers;
$response['techniciens']=$techniciens;
echo json_encode($response);