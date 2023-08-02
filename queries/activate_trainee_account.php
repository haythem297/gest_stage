<?php
session_start();
include('../includes/Database.php');
$db = new Database();
$id=$db->escapeString($_GET['id']);
$db->update('trainees',array('account_state'=>1),'id='.$id);
$db->getResult();
header('location:../gest_trainees.php');