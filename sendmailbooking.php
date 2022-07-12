<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
require ('phpmailer/PHPMailerAutoload.php');	

function sendmail($reference_number){
    include("dbconfig.php");
//$url="https://maubantourism.smartpay.ph";
//if($connectedtolive==0){
    $url='https://tourism-test.smartpay.ph';
//}
//$mail = new PHPMailer();

    $qr1 = excecutequery("call sp_getvehicleinfo('".$reference_number."')");
    $veh="";
    while ($row1 = $qr1->fetch_assoc()) {
       $veh=$veh.' <td
            style="color: #153643;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding: 25px 0 0 0;">
            <img src="'.$url.'/tourbookingphp/tempdata/'.$row1['filename'].'" alt="Creating Email Magic." width="80" height="80" style="display: block;" />
        </td>';
    }
    // $conn->next_result();
  $qr = excecutequery("call sp_getregistrationinfo('".$reference_number."')");
  while ($row = $qr->fetch_assoc()) {
    $Mto=$row['email'];
    $message ='
    <!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Demystifying Email Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style type="text/css">
        a[x-apple-data-detectors] {
            color: inherit !important;
        }
    </style>

</head>

<body style="margin: 0; padding: 0;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 20px 0 30px 0;">

                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                    style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <tr>
                        <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                            <img src="'.$url.'/tourbookingphp/images/smartpay.PNG"
                                alt="Creating Email Magic." width="100%" height="230" style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="border-collapse: collapse;">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif;">
                                        <h1 style="font-size: 24px; margin: 0;">Thank you for transacting with us!</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
                                        <p style="margin: 0;">We have successfully received your payment for your Mauban
                                            Tour, below are the transaction details:.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="border-collapse: collapse;">
                                            <tr>
                                                <td width="260" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                        style="border-collapse: collapse;">
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                Reference Number:
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                Transaction Number:
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                Date and Time of Travel:
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                Number of Guest:
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                Number Vehicle:
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                <td width="260" valign="top">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                        style="border-collapse: collapse;">
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                               '.$reference_number.'
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                               '.$row['id'].'
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                '.$row['fromdate'].' '.$row['slotid'].'
                                                            </td>
                                                        </tr>
                                                      
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                '.$row['pax'].'
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                '.$row['vehicle'].'
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                        style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td width="260" valign="top">
                                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                                        width="100%" style="border-collapse: collapse;">
                                                                        <tbody >
                                                                            <tr >
                                                                                <td
                                                                                    style="color: #153643;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding: 25px 0 0 0;">
                                                                                    Registrater QR Code
                                                                                </td>
                                                                            </tr>



                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                                    &nbsp;</td>

                                                            </tr>
                                                            <tr>
                                                                <td width="260" valign="top">
                                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                                        width="100%" style="border-collapse: collapse;">
                                                                        <tbody >
                                                                            <tr >
                                                                                <td
                                                                                    style="color: #153643;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding: 25px 0 0 0;">
                                                                                    <img src="'.$url.'/tourbookingphp/tempdata/'.$row['qrcode'].'"
                                                                                    alt="Creating Email Magic." width="50%" height="120" style="display: block;" />
                                                                                </td>
                                                                            </tr>



                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                                    &nbsp;</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                        style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td width="260" valign="top">
                                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                                        width="100%" style="border-collapse: collapse;">
                                                                        <tbody >
                                                                            <tr >
                                                                                <td
                                                                                    style="color: #153643;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding: 25px 0 0 0;">
                                                                                    Vehicle QR Code
                                                                                </td>
                                                                            </tr>



                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                                    &nbsp;</td>

                                                            </tr>
                                                            <tr>
                                                                <td width="260" valign="top">
                                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                                        width="100%" style="border-collapse: collapse;">
                                                                        <tbody >
                                                                            <tr >'.
                                                                        
                                                                            $veh
                                                                               
                                                                          .  '</tr>



                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                                    &nbsp;</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>


                    <tr>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="border-collapse: collapse;">

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#ee4c50" style="padding: 30px 30px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
                            <p style="margin: 0;">For any question and clarification kindly email us at <a
                                    href="mailto:admin@smartpay.ph" style="color: #0000FF;">admin@smartpay.ph</a>
                            </p>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>
    </table>

    </td>
    </tr>
    </table>
</body>

</html>
    
    '
    
    ;
  }
 
  $mail = new PHPMailer(); // create a new object
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465; // or 587
  $mail->IsHTML(true);
//   $mail->Username = "DOT_Mauban@smartpay.ph";
//   $mail->Password = "M@ub@n2021"; 
//   $mail->setFrom("DOT_Mauban@smartpay.ph");
  $mail->Username = "maubanmailer@gmail.com";
  $mail->Password = "mauban@123"; 
  $mail->setFrom("maubanmailer@gmail.com");
  $mail->AddAddress($Mto);	
  $mail->Subject = "Mauban Tourism Receipt";
  $mail->Body =  $message ;
  $mail->addBcc("randyfutalan83@gmail.com");
  $mail->addBcc("admin@smartpay.ph");
  $mail->addBcc("anant.shetty.134@gmail.com");
   if(!$mail->Send()) {
   //   echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
   
    //  echo "Message has been sent";
   }

// $mail->isSMTP(); 
// $mail->SMTPAuth = true;   
// $mail->SMTPSecure = 'ssl';                 
// $mail->Host = "smtp.gmail.com";                         
// $mail->Port = "465";         
// $mail->Username = "maubanmailer@gmail.com";
// $mail->Password = "mauban";                             

// $mail->setFrom("maubanmailer@gmail.com");
// $mail->AddAddress("anant.shetty.134@gmail.com");	

// $mail->isHTML(true);                                // Set email format to HTML

// $mail->Subject = 'Mauban Booking';
// $mail->Body    = $message;

// if(!$mail->send()) {
        
//     $return_arr = array();
//     $return_arr[] = array("status" =>0 ,
//     "message" =>'Mailer Error: ' . $mail->ErrorInfo   
//         );
//     echo json_encode($return_arr); 
// } 
// else {
	
//     $return_arr = array();
//     $return_arr[] = array("status" =>1 ,
//     "message" =>'sent'   
//         );
//     echo json_encode($return_arr); 
	
// }

}





?>



