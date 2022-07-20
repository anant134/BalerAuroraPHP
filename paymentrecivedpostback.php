<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//include("dbconfig.php");
//include("generateqr.php");
require ('phpmailer/PHPMailerAutoload.php');	
try {
  function excecutequery($sqlquery)
{
    $dbhost = 'mauban-rds.c3vmdc1lq3gg.ap-southeast-1.rds.amazonaws.com';
    $dbuser = 'admin';
    $dbpass = 'MaubanI2t123';
    $db='baleraurora_test';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die ("could not connect to mysql");
    $result = $conn->query($sqlquery);
    mysqli_close($conn);
    return $result;
}
  function _generate_digest($params, $secret_key)
  {
       ksort($params);
       $data_string = '';
       foreach ($params as $key => $value) { $data_string .= $value . '|'; }
       return sha1($data_string . $secret_key);
  }
  $data = file_get_contents('php://input');
  $absolute_url = "";
  $responsdata=json_decode($data, true);
  $postbackdatetime='postbackexecute--'.date('Y-m-d H:i:s');
  $rawdata = array(
   "merchant_order_no" => $responsdata["merchant_order_no"],
   "amount" => $responsdata["amount"],
   "currency" => "PHP",
   "customer_email" => $responsdata["customer_email"],
   "customer_name" => $responsdata["customer_name"],
   "description" => $responsdata["description"],
   "convenience_fee" => $responsdata["convenience_fee"],
   "channel_fee" => $responsdata["channel_fee"],
   "channel" => $responsdata["channel"],
   "customer_mobile_number" => $responsdata["customer_mobile_number"],
   "remarks" => $responsdata["remarks"],
   "reference_number" => $responsdata["reference_number"],
   "status" => $responsdata["status"],
   "created_at" => $responsdata["created_at"],
   "paid_at" => $responsdata["paid_at"],
);
  $generateddigest="";
  //_generate_digest($rawdata,'b52477dc0080408713269429e82ce7f7');
  $incomingdigest =$responsdata["digest"] ;
  $qr = excecutequery("call sp_paymentreceivedlog('".$data."','".$postbackdatetime."','".$absolute_url."','".$responsdata["digest"]."','".$generateddigest."')");

  if (!empty($data)){
       $myJSON=json_encode($data);
       $responsdatanew=json_decode($data, true);

       $reference_number=$responsdatanew["reference_number"];



       if($responsdatanew["status"]=="success"){
        $qrup = excecutequery("call sp_updatepaymentreceived('" . $reference_number . "')");
        $url="https://maubantourism.smartpay.ph";
        $qrveh = excecutequery("call sp_getregistrationinfo('".$reference_number."')");
        $veh="";
        
       
        while ($row3 = $qrveh->fetch_assoc()) {
          
           $veh=$veh.' <td
                style="color: #153643;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;padding: 25px 0 0 0;">
                <img src="'.$url.'/tourbookingphp/tempdata/'.$row1['filename'].'" alt="Creating Email Magic." width="80" height="80" style="display: block;" />
            </td>';
         }
       
        $qr2 = excecutequery("call sp_getregistrationinfo('".$reference_number."')");
        //print_r($qr2);
        while ($row2 = $qr2->fetch_assoc()) {
           // print_r($row2['email']);
            $Mto=$row2['email'];
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
                                                                      '.$row2['id'].'
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                        '.$row2['fromdate'].' '.$row2['slotid'].'
                                                                    </td>
                                                                </tr>
                                                              
                                                                <tr>
                                                                    <td
                                                                        style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                        '.$row2['pax'].'
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
                                                                        '.$row2['vehicle'].'
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
                                                                                            <img src="'.$url.'/tourbookingphp/tempdata/'.$row2['qrcode'].'"
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

        </html>';

          }
          $mail = new PHPMailer(); // create a new object
          $mail->IsSMTP(); // enable SMTP
          $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
          $mail->SMTPAuth = true; // authentication enabled
          $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 465; // or 587
          $mail->IsHTML(true);
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
      }
   }else{
     $qr = excecutequery("call sp_paymentreceivedlog('".$data."','postbacknoresponse')");
   }
  http_response_code(200);
   exit;
} catch (\Throwable $th) {

  $qr = excecutequery("call sp_applicationlog('".$th->getMessage()."')");
  echo($th->getMessage());
  http_response_code(400);
  exit;
}?>
