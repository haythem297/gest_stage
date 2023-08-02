<?php
session_start();
include('../includes/Database.php');
include('../includes/Crypt.php');
$db = new Database();
$crypt = new Crypt();
$in_list = $db->escapeString($_POST['in_list']);
$fname = $db->escapeString($_POST['fname']);
$lname = $db->escapeString($_POST['lname']);
$cin = $db->escapeString($_POST['cin']);
$gender = $db->escapeString($_POST['gender']);
$email = $db->escapeString($_POST['email']);
$tel = $db->escapeString($_POST['tel']);
$institut = $db->escapeString($_POST['institut']);
$username = $db->escapeString($_POST['username']);
$password = $crypt->Encrypt($db->escapeString($_POST['password']));
$errors = '';
$db->select('trainees','*',null,'cin="'.$cin.'"');
$count_cin = $db->numRows();
if($count_cin>0)
    $errors .= 'CIN deja utilisé<br>';
$db->select('trainees','*',null,'email="'.$email.'"');
$count_email = $db->numRows();
if($count_email>0)
    $errors .= 'EMAIL deja utilisé<br>';
$db->select('trainees','*',null,'tel="'.$tel.'"');
$count_tel= $db->numRows();
if($count_tel>0)
    $errors .= 'Numéro GSM deja utilisé<br>';
$db->select('trainees','*',null,'username="'.$username.'"');
$count_username = $db->numRows();
if($count_username>0)
    $errors .= 'Nom d\'utilisateur deja utilisé<br>';
header('Content-type: application/json');
if($errors == ''){
    if($in_list=="true"){
        $db->insert('trainees',array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'cin'=>$cin,'email'=>$email,'tel'=>$tel,'institute'=>$institut,'username'=>$username,'password'=>$password,'account_state'=>1));
        $db->getResult();
        $response['msg'] = 'Enregistré avec succés, redirection...';
        $response['state'] = 'ok';
        echo json_encode($response);
    }else{
        $db->select('scolar_establishment','*',null,'name="'.$db->escapeString($_POST['institute']).'"');
        $count_ins = $db->numRows();
        if($count_ins>0){
            $ins_id = $db->getResult()[0]['id'];
            $db->insert('trainees',array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'cin'=>$cin,'email'=>$email,'tel'=>$tel,'institute'=>$ins_id,'username'=>$username,'password'=>$password,'account_state'=>1));
            $db->getResult();
            $response['msg'] = 'Enregistré avec succés, redirection...';
            $response['state'] = 'ok';
            echo json_encode($response);
        }else{
            $db->insert('scolar_establishment',array('name'=>$db->escapeString($_POST['institute']),'tel1'=>$db->escapeString($_POST['tel1']),'tel2'=>$db->escapeString($_POST['tel2']),'fax'=>$db->escapeString($_POST['fax']),'email'=>$db->escapeString($_POST['email_ins']),'adress'=>$db->escapeString($_POST['adress']),'type'=>$db->escapeString($_POST['type'])));
            $id_est = $db->getResult()[0];
            $db->insert('trainees',array('fname'=>$fname,'lname'=>$lname,'gender'=>$gender,'cin'=>$cin,'email'=>$email,'tel'=>$tel,'institute'=>$id_est,'username'=>$username,'password'=>$password,'account_state'=>1));
            $db->getResult();
            $response['msg'] = 'Enregistré avec succés, redirection...';
            $response['state'] = 'ok';
            echo json_encode($response);
        }
    }
}else{
    $response['msg'] = $errors;
    $response['state'] = 'exist';
    echo json_encode($response);
}