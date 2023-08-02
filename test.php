<?php
include 'includes/init.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/printthis.js"></script>
    <link src="css/print.min.css" />
</head>
<body>
<button type="button" onclick="printPdfBase64()"class="fa-paper-plane">
    Print PDF with Message
</button>
 <script>
 window.printPdfBase64 = function() {
	$.ajax({
        url:'queries/test.php',
        method:'GET',
        dataType:'json',
        success:function(result){
            printJS({
			  printable: result.file,
			  type: 'pdf',
			  base64: true
			})
        }
    })	
    //fetch('https://printjs.crabbly.com/docs/base64.txt').then(function(response) {
            
	//	  response.text().then(function(base64) {
    //          console.log(base64)
	//		printJS({
	//		  printable: base64,
	//		  type: 'pdf',
	//		  base64: true
	//		})
	//	  })
		//})
	  }
 </script>
<script src="js/jquery.min.js"></script>
<script src="plugins/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>