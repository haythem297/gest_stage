<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$function = $_POST['function'];
$db->select('config_certificate','*');
if($db->numRows()==0){
    $db->insert('config_certificate',array('div_fname'=>$fname,'div_lname'=>$lname,'div_post'=>$function));
    $db->getResult();
    $response['msg'] = 'Enregistré avec succés';
    $response['state'] = 'ok';
    echo json_encode($response);
}else{
    $db->update('config_certificate',array('div_fname'=>$fname,'div_lname'=>$lname,'div_post'=>$function),'1=1');
    $db->getResult();
    $response['msg'] = 'Enregistré avec succés';
    $response['state'] = 'ok';
    echo json_encode($response);
}