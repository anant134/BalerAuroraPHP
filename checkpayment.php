<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("dbconfig.php");
define("SECRETKEY", "i2ttourbooking");
include("generateqr.php");
//include("tickectgeneration.php");
$params = (array) json_decode(file_get_contents('php://input'), TRUE);
$result_arr = [];
// $result_arr["resultkey"]=0;
// $result_arr["resultvalue"]=array();
$transactionurl=$weburl;
$result = [];
$requestfor = $params["requestfor"];
//echo $requestfor;
switch ($requestfor) {
    case 'getorder':
        //echo json_encode($params["data"]["reference_number"]);
         if($connectedtolive==1){
            $url="https://api.smartpay.net.ph/order?reference_number=".$params["data"]["reference_number"];
          }else{
            $url="https://api-test.smartpay.net.ph/order?reference_number=".$params["data"]["reference_number"];
          }
          $url= geturl($url,$connectedtolive);
      
          $dasa=json_decode($url, true);
            
         echo json_encode($dasa);
            break;
}

function  geturl($url,$connectedtolive){
    $curl = curl_init();
    
if($connectedtolive==0){
  $HTTPHEADER =array(
      'Authorization: Bearer dypfHwt0s7QZ8XIh',
      'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
     );
}else{
    $HTTPHEADER =array(
            'Authorization: Bearer iCA5gFJkrwLUZ4jW',
            'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
          );
}
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

