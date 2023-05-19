<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("dbconfig.php");
define("SECRETKEY", "i2ttourbooking");
include("generateqr.php");
error_reporting(E_ALL);
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
        
         $url= geturlorder('BD1ADEB4');
      
         $dasa=json_decode($url, true);
       //  print_r($dasa);
         print_r($dasa["results"]["data"]["status"]);


         $qr = excecutequery("call sp_uncreateqrcode('" . $query . "')");
        
         while ($row = $qr->fetch_assoc()) {
            $id = $row['id'];
            $reference_number = $row['paymentreferencenumber'];
            updateqrcode($id,$reference_number);
         }



            break;
    case 'registration_test_baler_aurora_test':
        $query = json_encode($params["data"]);
        $dasa=json_decode($query, true);
        $customer_email=$dasa["touristinfo"][0]["emailid"];
        $customer_name=$dasa["touristinfo"][0]["Firstname"];
        $totalchrg=number_format((float)$dasa["totalcharge"], 2, '.', '');
        $filename=random_string(6);
        $array =[];
        $url="Tes";
        $qr = excecutequery("call sp_saveregistration('" . $query . "')");
        
        // while ($row = $qr->fetch_assoc()) {
        //     //print_r($row);
        //     // $id = $row['id'];
        //     // $errflag = $row['errflag'];
        //     // $paymentid = $row['paymentid'];
        //     // $paymentidwithreg = $row['paymentidwithreg'];
        //     // $return_arr[] = array(
        //     //     "rowid" => $id,
        //     //     "errflag" => $errflag,
        //     //     "paymentid" => $paymentid,
        //     //     "paymentidwithreg" => $paymentidwithreg
                
        //     // );
        // }
        
                $result[] = array(
                    "resultkey" => 0,
                    "resultvalue" =>"call sp_saveregistration('" . $query . "')"
                );
            
                echo json_encode($result[0]);
            break;
    case 'registration_test_baler_aurora':
        $query = json_encode($params["data"]);
        $dasa=json_decode($query, true);
        $customer_email=$dasa["touristinfo"][0]["emailid"];
        $customer_name=$dasa["touristinfo"][0]["Firstname"];
        $totalchrg=number_format((float)$dasa["totalcharge"], 2, '.', '');
        $filename=random_string(6);
        $array =[];
     //   print_r( "call sp_saveregistration('" . $query . "')");
        $qr = excecutequery("call sp_saveregistration('" . $query . "')");
        while ($row = $qr->fetch_assoc()) {
            $id = $row['id'];
            $errflag = $row['errflag'];
            $decodedata=json_decode($query, true);
            $paymentid = $row['paymentid'];
            $paymentidwithreg = $row['paymentidwithreg'];

            

            // $id = $row['rowid'];
            $return_arr[] = array(
                "rowid" => $id,
                "errflag" => $errflag,
                "paymentid" => $paymentid,
                "paymentidwithreg" => $paymentidwithreg
                
            );
        }
        if (!(empty($return_arr))) {
          

            $rawdata = array(
                "merchant_order_no" => $return_arr[0]["paymentid"],
                "amount" => $totalchrg,
                "currency" => "PHP",
                "customer_email" => $customer_email,
                "customer_name" => $customer_name,
                "description" => "Baler Tourism",
            
                
            );
           // print_r("00000");
           // print_r($rawdata);
          //mauban     $digest=_generate_digest($rawdata,'b52477dc0080408713269429e82ce7f7');
          //gigantes
           $digest=_generate_digest($rawdata,'CTKRZh13OTMWbcGDuQnGXw3N8');
            $data = array( 
                "merchant_order_no" => $return_arr[0]["paymentid"],
                "amount" => $totalchrg,
                "currency" => "PHP",
                "customer_email" => $customer_email,
                "customer_name" => $customer_name,
                "description" => "Baler Tourism",
                'digest' => $digest);
             //   print_r($data);
            $qr = excecutequery("call sp_paymentlog('" .json_encode($data). "','".$return_arr[0]["rowid"]."','s')");
            $url= geturl($data,1);
           
            $qr = excecutequery("call sp_paymentlog('" .$url. "','".$return_arr[0]["rowid"]."','r')");
             $return_arr['url'] = $url; 
             $json = json_decode($url, true);
            $vehids =[];
            $filename=random_string(6);
            $array[] =  array(
                "filename" => 'qrr'.$filename.'_',
                "data" =>$return_arr[0]["rowid"].'_0'
                
            );
            $qrfiles= genqr($array);
            $vehfiles =[];
            $qrfilesarr=[];
           if($json['results']['message']=='Success.'){
                //$conn->next_result();
                $qr = excecutequery("call sp_updatepaymentreferencenumber('" . $json['results']['data']['reference_number']. "','".$return_arr[0]["rowid"]."','".$qrfiles[0]["qrfilename"]."')");
               
                
            }
              
            
            $result[] = array(
                "resultkey" => 1,
                "resultvalue" => $return_arr
            );  
        } else {
            $result[] = array(
                "resultkey" => 0,
                "resultvalue" => "Error data not saved"
            );
        }
        
        //print_r($result[0]);
        
        echo json_encode($result[0]);
        break;
       
       
            break;
        case 'registration_old':
           
            $query = json_encode($params["data"]);
            $dasa=json_decode($query, true);
            $customer_email=$dasa["touristinfo"][0]["emailid"];
            $customer_name=$dasa["touristinfo"][0]["Firstname"];
            $totalchrg=number_format((float)$dasa["totalcharge"], 2, '.', '');
            $filename=random_string(6);
            $array =[];
           
            
            // //     "customer_name" => "Tester",
    
            //print_r();
            // print_r($dasa["fromdate"]);
            // print_r($dasa["touristinfo"][0][""]);
            // for ($i = 0; $i < count($dasa); $i++) {
            //     print_r($dasa["fromdate"]."--".count($dasa)) ;
               
            // }
    
    
                //generate QR
    
                //
                
             $qr = excecutequery("call sp_saveregistration('" . $query . "')");
               
        
            //     //  genqr(1,'1_3');
            // // $mordernum= mt_rand(100000, 999999);
            // // $rawdata = array(
            // //     "merchant_order_no" => $mordernum,
            // //     "amount" => "20.00",
            // //     "currency" => "PHP",
            // //     "customer_email" => "test@yopmail.com",
            // //     "customer_name" => "Tester",
            // //     "description" => "Test",
               
                 
            // // );
            // // $digest=_generate_digest($rawdata,'b52477dc0080408713269429e82ce7f7');
            // // $data = array( 
            // //     "merchant_order_no" => $mordernum,
            // //     "amount" => "20.00",
            // //     "currency" => "PHP",
            // //     "customer_email" => "test@yopmail.com",
            // //     "customer_name" => "Tester",
            // //     "description" => "Test",
            // //      'digest' => $digest);
            // // $url= geturl($data);
            // // print($url);
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $errflag = $row['errflag'];
                $decodedata=json_decode($query, true);
                $paymentid = $row['paymentid'];
                $paymentidwithreg = $row['paymentidwithreg'];
    
                
    
                // $id = $row['rowid'];
                $return_arr[] = array(
                    "rowid" => $id,
                    "errflag" => $errflag,
                    "paymentid" => $paymentid,
                    "paymentidwithreg" => $paymentidwithreg
                    
                );
            }
            if (!(empty($return_arr))) {
              
    
                  // // $mordernum= mt_rand(100000, 999999);
                $rawdata = array(
                    "merchant_order_no" => $return_arr[0]["paymentid"],
                    "amount" => $totalchrg,
                    "currency" => "PHP",
                    "customer_email" => $customer_email,
                    "customer_name" => $customer_name,
                    "description" => "Mauban Tourism",
                
                    
                );
                //sandbox
               // if($connectedtolive==0){
                    $digest=_generate_digest($rawdata,'b52477dc0080408713269429e82ce7f7');
    //             }else{
    //    //live
               
    //            $digest=_generate_digest($rawdata,'090d30d2335f8bc11cf4c1f921a052ed');
             
    //             }
                $data = array( 
                    "merchant_order_no" => $return_arr[0]["paymentid"],
                    "amount" => $totalchrg,
                    "currency" => "PHP",
                    "customer_email" => $customer_email,
                    "customer_name" => $customer_name,
                    "description" => "Mauban Tourism",
                    'digest' => $digest);
               // $conn->next_result();
                $qr = excecutequery("call sp_paymentlog('" .json_encode($data). "','".$return_arr[0]["rowid"]."','s')");
                //payment sent log
                $url= geturl($data,1);
                //payment sent log
               // $conn->next_result();
                $qr = excecutequery("call sp_paymentlog('" .$url. "','".$return_arr[0]["rowid"]."','r')");
                //payment sent log
                // $url= geturl($data);
                 $return_arr['url'] = $url; 
                 $json = json_decode($url, true);
            
                //qr generation
                $vehids =[];
                $filename=random_string(6);
                $array[] =  array(
                    "filename" => 'qrr'.$filename.'_',
                    "data" =>$return_arr[0]["rowid"].'_0'
                    
                );
                for ($i = 0; $i < count($dasa["touristvehicles"]); $i++) {
                    $filename=random_string(6);
                    $array[] =  array(
                        "filename" => 'qrv'.$filename.'_',
                        "data" =>$return_arr[0]["rowid"].'_'.$dasa["touristvehicles"][$i]["id"].$i
                        
                    );
                    $vehids[]=array(
                        'vehid'=>$dasa["touristvehicles"][$i]["id"]
                    );
                }
                $qrfiles= genqr($array);
               // print_r("call sp_updateqrcodes('" .json_encode($qrfiles) . "',1)");
                $vehfiles =[];
                $qrfilesarr=[];
                $vehdata=($dasa["touristvehicles"]);
                if(count($vehdata)>0){
                    for ($i = 0; $i < count($qrfiles); $i++) {
                        if($i==0){
            
                        }else{
                            $qrfiles[$i]["vehid"]=$vehdata[$i-1]["id"];
                            // $qrfilesarr=array($qrfiles[$i]);
                            $vehfiles[]=$qrfiles[$i];
                        }
                    }
                   
                }
               
                
    //            "call sp_updateqrcodes('" .json_encode($vehfiles) . "',".$return_arr[0]["rowid"].")");
    
      
                if($json['results']['message']=='Success.'){
                    //$conn->next_result();
                    $qr = excecutequery("call sp_updatepaymentreferencenumber('" . $json['results']['data']['reference_number']. "','".$return_arr[0]["rowid"]."','".$qrfiles[0]["qrfilename"]."')");
                    if(count($vehdata)>0){
                     //   echo ("call sp_updateqrcodes('" . json_encode($vehfiles). "',".$return_arr[0]["rowid"].")");                    ;
                      //  $conn->next_result();
                        $qr = excecutequery("call sp_updateqrcodes('" . json_encode($vehfiles). "',".$return_arr[0]["rowid"].")");
                    }
                    
                }
                  
                
                $result[] = array(
                    "resultkey" => 1,
                    "resultvalue" => $return_arr
                );  
            } else {
                $result[] = array(
                    "resultkey" => 0,
                    "resultvalue" => "Error data not saved"
                );
            }
            
            //print_r($result[0]);
            
            echo json_encode($result[0]);
            break;
             break;
}
function _generate_digest($params, $secret_key)
 {
      ksort($params); 
      $data_string = ''; 
      foreach ($params as $key => $value) { $data_string .= $value . '|'; } 
      return sha1($data_string . $secret_key);
 }


 function  geturl($digest,$connectedtolive){
    $curl = curl_init();
  
//    {
//         $curlurl = "https://api.smartpay.net.ph/order";
//         $HTTPHEADER =array(
//                 'Authorization: Bearer iCA5gFJkrwLUZ4jW',
//                 'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
//               );
//     }
{
    // $curlurl = "https://api-test.smartpay.net.ph/order";
    // $HTTPHEADER =array(
    //     'Authorization: Bearer dypfHwt0s7QZ8XIh',
    // 'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
    //       );
     $curlurl = "https://api-test.smartpay.net.ph/order";
    $HTTPHEADER =array(
        'Authorization: Bearer 3swAOzblbK6bCo67',
    'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
          );
          
    
}
curl_setopt_array($curl, array(
  CURLOPT_URL => $curlurl,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $digest,
  CURLOPT_HTTPHEADER => $HTTPHEADER,

));

$response = curl_exec($curl);

curl_close($curl);
return $response;
 }
 
 function  geturlorder($digest){
    $curl = curl_init();
//https://api-test.smartpay.net.ph/order
//https://api.smartpay.net.ph/order
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-test.smartpay.net.ph/order?reference_number='.$digest,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer dypfHwt0s7QZ8XIh',
    'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
  ),

//     CURLOPT_HTTPHEADER => array(
//     'Authorization: Bearer iCA5gFJkrwLUZ4jW',
//     'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
//   ),

));

$response = curl_exec($curl);

curl_close($curl);
return $response;
 }
 function  updateqrcode($regid,$reference_number){
    $curl = curl_init();
//https://api-test.smartpay.net.ph/order
//https://api.smartpay.net.ph/order
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://tourism-test.smartpay.ph/tourbookingphp/tickectgeneration.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('regid' =>$regid ,'reference_number' => $reference_number),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer dypfHwt0s7QZ8XIh',
    'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
  ),

//     CURLOPT_HTTPHEADER => array(
//     'Authorization: Bearer iCA5gFJkrwLUZ4jW',
//     'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
//   ),

));

$response = curl_exec($curl);

curl_close($curl);
return $response;
 }

 
 function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}