<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    include("dbconfig.php");
    define ("SECRETKEY", "i2ttourbooking");
    include("generateqr.php");
    $params = (array) json_decode(file_get_contents('php://input'), TRUE);
    $result = [];
    $requestfor = $params["requestfor"];
    switch ($requestfor) {
        case 'checkPayment':
            // $digits = 3;
            // $randdig= rand(pow(10, $digits-1), pow(10, $digits)-1);
        
            // $rawdata = array(
            //     "merchant_order_no" => $randdig,
            //     "amount" => 100.00,
            //     "currency" => "PHP",
            //     "customer_email" => 'anant@gmail.com',
            //     "customer_name" => 'Akshay',
            //     "description" => "Mauban Tourism");
            // $digest=_generate_digest($rawdata,'b52477dc0080408713269429e82ce7f7');
            // $data = array( 
            //         "merchant_order_no" => $randdig,
            //         "amount" => 100.00,
            //         "currency" => "PHP",
            //         "customer_email" => 'anant@gmail.com',
            //         "customer_name" => 'Akshay',
            //         "description" => "Mauban Tourism",
            //         'digest' => $digest);
        
            // geturl($data,$connectedtolive);
            $dataid=random_string(6);
            $filename=random_string(6);
            $array[] =  array(
                "filename" => 'qrr'.$filename.'_',
                "data" =>$dataid.'_0'
                
            );
            $qrfiles= genqr($array);
            $result[] = array(
                "resultkey" => 1,
                "resultvalue" => 'anant'
            );  
            echo json_encode($result[0]);
            break;
    }
    function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
    
        return $key;
    }

    function  geturl($digest,$connectedtolive){
        $curl = curl_init();
//        if($connectedtolive==0){
            $curlurl = "https://api-test.smartpay.net.ph/order";
            $HTTPHEADER =array(
                'Authorization: Bearer dypfHwt0s7QZ8XIh',
                'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
               );
        // }else{
        //     $curlurl = "https://api.smartpay.net.ph/order";
        //     $HTTPHEADER =array(
        //             'Authorization: Bearer iCA5gFJkrwLUZ4jW',
        //             'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
        //           );
        // }
       
    //https://api-test.smartpay.net.ph/order
    //https://api.smartpay.net.ph/order
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
    
    //     CURLOPT_HTTPHEADER => array(
    //     'Authorization: Bearer iCA5gFJkrwLUZ4jW',
    //     'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
    //   ),
    
    ));
    //print($curl);
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    return $response;
     }
    function _generate_digest($params, $secret_key)
    {
        ksort($params); 
        $data_string = ''; 
        foreach ($params as $key => $value) { $data_string .= $value . '|'; } 
        return sha1($data_string . $secret_key);
    }
    
        
?>