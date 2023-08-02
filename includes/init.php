<?php
session_start();
include(dirname(__FILE__).'/Database.php');
include(dirname(__FILE__).'/Crypt.php');
$db = new Database();
$crypt = new Crypt();
if(!isset($_SESSION['user']))
    header('Location:login.php');
if(isset($_GET['logout'])){
    session_destroy();
    header('LOCATION:login.php');
}