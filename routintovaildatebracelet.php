<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("dbconfig.php");
define("SECRETKEY", "i2ttourbooking");
include("generateqr.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("sendmailbooking.php");
error_reporting(E_ALL);
?>
<?php 
 $qr = excecutequery("call sp_GetAllUnPaidTransaction()");
 while ($row = $qr->fetch_assoc()) {

 }
?>