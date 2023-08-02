<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$arr = $_POST['data'];
for($i=0;$i<sizeof($arr);$i++){
    $db->insert('attendance',array('id_trainee'=>$arr[$i]['id'],'date'=>date('Y-m-d'),'state'=>($arr[$i]['state']=='true')?'a':'p'));
    $db->getResult();
}
header('Content-Type:application/json');
echo json_encode($response['status'] = 'ok');