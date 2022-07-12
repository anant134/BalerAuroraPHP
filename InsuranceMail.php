


<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function sendmailtoInsurance($tripid){

   $counter=1;
   $csvData="";
   $emailid="";
   $csvData="";
   $qr = excecutequery("call sp_getinsurancedetail('{'tripid':".$tripid."}')");
   while ($row = $qr->fetch_assoc()) {
      if ($emailid==""){
         $emailid=$row['emailid'];
      }
      $csvData+=$counter.",".$row['firstname'].",,".$row['lastname'].",".$row['dob'].",".$row['mobilenumber'].",,".$row['emailid'].",".$row['fromdate'].",".$row['todate']."\n"
       
   }
   if ($csvData!=""){
      $csvData=$csvData.substr(0,len($csvData)-1);
   }

require ('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$csvHeader = "No,FIRST NAME,MIDDLE NAME,LAST NAME,BIRTH  DATE,CONTACT NUMBER,OCCUPATION,E-MAIL ADDRESS,FROM,TO";

$mail->AddStringAttachment($csvHeader ."\n" . $csvData, 'DECLARATION_TEMLATE_'.$tripid.'.xlxs', 'base64', 'application/vnd.ms-excel');

$mail->Username = "maubanmailer@gmail.com";
$mail->Password = "mauban@123"; 
$mail->setFrom("maubanmailer@gmail.com");
$mail->AddAddress($emailid);	
$mail->Subject = "Mauban Tourism Insurance";
$mail->Body = 'Insurance' ;
$mail->addBcc("anant.shetty.134@gmail.com");
 if(!$mail->Send()) {
 //   echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
 
  //  echo "Message has been sent";
 }
}

?>