<?php
session_start();
$certif_content = $_POST['content'];
$certif_content = str_replace("@currentdate",date('d-m-Y'),$certif_content);
require '../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
ob_start();
include dirname(__FILE__).'/certif1.php';
$html2pdf = new Html2Pdf('L', 'A4', 'fr',true,'UTF-8');
$content = ob_get_clean();
$html2pdf->writeHTML($content);
$response = [];
$response['state'] = 'ok';
$response['file']=$html2pdf->output('test.pdf','E');
echo json_encode($response);