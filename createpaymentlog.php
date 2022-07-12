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
function random_string1($length) {
  $key = '';
  $keys = array_merge(range(0, 9), range('a', 'z'));

  for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
  }

  return $key;
}
?>
<?php
    $qr1 = excecutequery("select paymentreferencenumber from tblregistration");
    $count=0;
    //  $qr = excecutequery("call sp_getregistrationinfo('921B7469')");
   while ($row = $qr1->fetch_assoc()) {
    
     $url="https://api-test.smartpay.net.ph/order?reference_number=".$row["paymentreferencenumber"];
    // $url="https://api.smartpay.net.ph/order?reference_number=".$_GET["reference_number"];
    //  $url=$weburl."/payment?reference_number=".$row["paymentreferencenumber"];
      //print_r($url);
       $result= geturl($url,$connectedtolive);
     
      // $query=json_encode($result);
       $manage = json_decode($result, true);
     
       if($manage["status"]==1){
        
           //if($manage["results"]["data"]["status"]=="success"){
            
            //print_r($manage["results"]["data"]);
            // // $conn->next_result();
            try {
              //code...
            //   // $conn->next_result();
            //   $qr = excecutequery("call sp_updatepaymentreceived('" . $row["paymentreferencenumber"] . "')");
            
              $qr = excecutequery("call sp_PaymentStatus('" . $row["paymentreferencenumber"] . "','".json_encode($manage["results"]["data"])."')");
             // sendmail($row['paymentreferencenumber']);
            //   if($row["qrcode"]==""){
            //     $filename=random_string1(6);
            //     $array[] =  array(
            //         "filename" => 'qrr'.$filename.'_',
            //         "data" =>$row["id"] .'_0'
                    
            //     );
              
            //     $qrfiles= genqr($array);
                
            //     $qr = excecutequery("call sp_updatepaymentreferencenumber('" .$row['paymentreferencenumber']. "','".$row["id"]."','".$qrfiles[0]["qrfilename"]."')");
              
            //     sendmail($row['paymentreferencenumber']); 
            //     $qr = excecutequery("call sp_mailsent('".$row["paymentreferencenumber"]."')"); 
            //   }else{
            //     if($row['ismailsend']==0){
            //       sendmail($row['paymentreferencenumber']); 
            //       $qr = excecutequery("call sp_mailsent('".$row["paymentreferencenumber"]."')"); 
                  
            //     }
               
            //   }

             

            } catch (Throwable $th) {
              echo $th;
            }
           
             //// $conn->next_result();
           //  sendmail($row['paymentreferencenumber']);
           }
         }
      
       // echo ($manage["status"]);
     // print_r($manage["results"]["data"]["status"]);
  // }
   
   
    function  geturl($url){
        $curl = curl_init();
        
    // if($connectedtolive==0){
      $HTTPHEADER =array(
          'Authorization: Bearer dypfHwt0s7QZ8XIh',
          'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
         );
    // }else{
    //     $HTTPHEADER =array(
    //             'Authorization: Bearer iCA5gFJkrwLUZ4jW',
    //             'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
    //           );
    // }
    //https://api-test.smartpay.net.ph/order
    //https://api.smartpay.net.ph/order

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_POSTFIELDS => array('' => ''),
      // CURLOPT_HTTPHEADER => array(
      //   'Authorization:  Bearer iCA5gFJkrwLUZ4jW',
      //   'Cookie: ci_session=6gp7g6nmlhrf8g8cogqpma9ld5'
      // ),
    
        CURLOPT_HTTPHEADER => $HTTPHEADER,
    
    ));

   
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
     }
    


?>