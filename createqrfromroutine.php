<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//include("dbconfig.php");
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
function queryexcecute($sqlquery)
{
    $dbhost = 'mauban-rds.c3vmdc1lq3gg.ap-southeast-1.rds.amazonaws.com';
    $dbuser = 'admin';
    $dbpass = 'MaubanI2t123';
    $db='tourbooking';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die ("could not connect to mysql");
    $result = $conn->query($sqlquery);
    mysqli_close($conn);
    return $result;
}
    $qr1 = queryexcecute("call sp_GetAllUnPaidTransaction()");
    $count=0;
   while ($row = $qr1->fetch_assoc()) {
      $url="https://api.smartpay.net.ph/order?reference_number=".$row["paymentreferencenumber"];
       $result= geturl($url);
       $manage = json_decode($result, true);
       if($manage["status"]==1){
           $qr = queryexcecute("call sp_PaymentStatusUpdateByJob('" . $row["paymentreferencenumber"] . "','".json_encode($manage["results"]["data"])."')");
           if($manage["results"]["data"]["status"]=="success"){
            
            //print_r($manage["results"]["data"]);
            // $conn->next_result();
            try {
              //code...
             // $conn->next_result();
              $qr = queryexcecute("call sp_updatepaymentreceived('" . $row["paymentreferencenumber"] . "')");
            
              //$qr = queryexcecute("call sp_PaymentStatusUpdateByJob('" . $row["paymentreferencenumber"] . "','".json_encode($manage["results"]["data"])."')");
             // sendmail($row['paymentreferencenumber']);
              if($row["qrcode"]==""){
                $filename=random_string1(6);
                $array[] =  array(
                    "filename" => 'qrr'.$filename.'_',
                    "data" =>$row["id"] .'_0'
                    
                );
              
                $qrfiles= genqr($array);
                
                $qr = queryexcecute("call sp_updatepaymentreferencenumber('" .$row['paymentreferencenumber']. "','".$row["id"]."','".$qrfiles[0]["qrfilename"]."')");
              
               // sendmail($row['paymentreferencenumber']); 
                $qr = queryexcecute("call sp_mailsent('".$row["paymentreferencenumber"]."')"); 
              }else{
                if($row['ismailsend']==0){
                 // sendmail($row['paymentreferencenumber']); 
                  $qr = queryexcecute("call sp_mailsent('".$row["paymentreferencenumber"]."')"); 
                  
                }
               
              }

             

            } catch (Throwable $th) {
              echo $th;
            }
           
             //$conn->next_result();
           //  sendmail($row['paymentreferencenumber']);
           }else{
            
            $qr = queryexcecute("call sp_updatepaymentstatus('" . $row["paymentreferencenumber"] . "','".$manage["results"]["data"]["status"]."')");
            
           }
        }
      
    }
   
   
    function  geturl($url){
        $curl = curl_init();
    //https://api-test.smartpay.net.ph/order
    //https://api.smartpay.net.ph/order
    // live iCA5gFJkrwLUZ4jW
    // if($connectedtolive==0){
    //   $HTTPHEADER =array(
    //       'Authorization: Bearer dypfHwt0s7QZ8XIh',
    //       'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
    //      );
    // }else{
        $HTTPHEADER =array(
                'Authorization: Bearer iCA5gFJkrwLUZ4jW',
                'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
              );
   // }
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
      CURLOPT_HTTPHEADER => $HTTPHEADER
    
    
    
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
     }
    


?>