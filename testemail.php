<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
define("SECRETKEY", "i2ttourbooking");
include("generateqr.php");
include("sendmailbooking.php");
?>
 <?php
 
   $data = file_get_contents('php://input');
   
   
   $query=json_encode($_GET);
       
   $dasa=json_decode($query, true);
   print_r($dasa["reference_number"] );
    if (!empty($_GET)){
        
       // $qr = excecutequery("call sp_getregistrationinfo('" .$dasa["reference_number"] . "')");
     
        sendmail($dasa["reference_number"] );
        echo "<p>send mail</p>";
    }
?>