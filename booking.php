<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    include("dbconfig.php");
    define ("SECRETKEY", "i2ttourbooking");
    $params = (array) json_decode(file_get_contents('php://input'), TRUE);
    $result_arr=[];
    // $result_arr["resultkey"]=0;
    // $result_arr["resultvalue"]=array();
    $result=[];
    $requestfor=$params["requestfor"];

    switch ($requestfor) {
        case 'getbooking':
           
            $qr = excecutequery("call sp_GetBooking()");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $pax = $row['pax'];
                $fromdate = $row['fromdate'];
                $todate = $row['todate'];
                $numberofdays = $row['numberofdays'];
                $numberofvehicle = $row['numberofvehicle'];
                $totalcharge = $row['totalcharge'];
                $hotelid = json_decode($row['hotelid']);
                $boatid = json_decode($row['boatid']);
                $paymentreferencenumber = $row['paymentreferencenumber'];
                $qrcode = $row['qrcode'];
                $timesolt=$row['timesolt'];
                $curdate=$row['curdate'];
                $editable=$row['editable'];
                $return_arr[] = array(
                    "id" => $id,
                    "pax" =>$pax,
                    "fromdate" =>$fromdate,
                    "todate" =>$todate,
                    "numberofdays" =>$numberofdays,
                    "numberofvehicle" =>$numberofvehicle,
                    "totalcharge" =>$totalcharge,
                    "hotelid" =>$hotelid ,
                    "boatid" =>$boatid,
                    "paymentreferencenumber" =>$paymentreferencenumber,
                    "qrcode" =>$qrcode,
                    "timesolt"=>$timesolt,
                    "curdate"=>$curdate,
                    "editable"=>$editable
                );
            }
            if(!(empty($return_arr))){
                $result[]=array(
                    "resultkey"=>1,
                    "resultvalue"=>$return_arr
                );
               
            }else{
                $result[]=array(
                    "resultkey"=>0,
                    "resultvalue"=>"No data  found"
                );
            }
            echo json_encode($result[0]);
            break;

        case 'updatetourist':
            $query = json_encode($params["data"]);
            $data=json_decode($query, true);
            for ($i=0; $i <count($data["touristdata"]) ; $i++) { 
               // print_r("call sp_updatetouristdetail('" . json_encode($data["touristdata"][$i]) . "','".$data["loggedinid"]."')");
                $qr = excecutequery("call sp_updatetouristdetail('" . json_encode($data["touristdata"][$i]) . "','".$data["loggedinid"]."')");
               // echo("call sp_updatetouristdetail('" . json_encode($data["touristdata"][$i]) . "','".$data["loggedinid"]."')");
                // $conn->next_result();
                # code...
            }
            $result[]=array(
                "resultkey"=>1,
                "resultvalue"=>""
            );
            echo json_encode($result[0]);
            # code...
            break;
        case 'getbookingforedit':
            $query=json_encode($params["data"]);
            //print_r(("call sp_GetBookingInfoForEdit('".$query."')"));
            $qr = excecutequery("call sp_GetBookingInfoForEdit('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $pax = $row['pax'];
                $fromdate = $row['fromdate'];
                $todate = $row['todate'];
                $numberofdays = $row['numberofdays'];
                $totalcharge = $row['totalcharge'];
                $hotelid = $row['hotelid'];
                $boatid = $row['boatid'];
                $ispaymentdone = $row['ispaymentdone'];
                $paymentreferencenumber = $row['paymentreferencenumber'];
                $qrcode = $row['qrcode'];
                $isvipguest = $row['isvipguest'];
                $ismailsend = $row['ismailsend'];
                $slotid = $row['slotid'];
                $ishotelprovideboat = $row['ishotelprovideboat'];
                $vehicle = $row['vehicle'];
                $parkingnotreq = $row['parkingnotreq'];
                $hotelbookingref = $row['hotelbookingref'];
                $package = $row['package'];
                $editrefnum = $row['editrefnum'];
                $refundrefnum=$row['refundrefnum'];
                $newtotalcharge=$row['newtotalcharge'];
                $partialpayment=$row['partialpayment'];
                $partialpaymentreferencenumber=$row['partialpaymentreferencenumber'];
                $currentdate=$row['currentdate'];
                $isnoshowavailable=$row['isnoshowavailable'];
                $istouristvisited=$row['istouristvisited'];
                $isdaypass=$row["isdaypass"];
                $refundamt=$row["refundamt"];
                $isnoshowrefund=$row["isnoshowrefund"];
                $result_arrtourist=[];
                // $conn->next_result();
                $qr1 = excecutequery("call sp_GetTouristByRegid(".$row['id'].")");
                
                while ($row1 = $qr1->fetch_assoc()) {
                    $firstname = $row1['firstname'];
                    $lastname = $row1['lastname'];
                    $address1 = $row1['address1'];
                    $hotelidt = $row1['hotelid'];
                    $nationalityid = $row1['nationalityid'];
                    $mobilenumber = $row1['mobilenumber'];
                    $emailid = $row1['emailid'];
                    $dob = $row1['dob'];
                    $qrcode = $row1['qrcode'];
                    $rfid = $row1['rfid'];
                    $isassigned = $row1['isassigned'];
                    $citizenid = $row1['citizenid'];
                    $provinceid = $row1['provinceid'];
                    $municipalityid = $row1['municipalityid'];
                    $gender = $row1['gender'];
                    $ismaubancitizen = $row1['ismaubancitizen'];
                    $uploadimage = $row1['uploadimage'];
                    $actualimagename = $row1['actualimagename'];
                    $isprimary = $row1['isprimary'];
                    $isrentbracelet = $row1['isrentbracelet'];
                    $isreturningguest = $row1['isreturningguest'];
                    $isbraceletreturned = $row1['isbraceletreturned'];
                    $isbraceletavailable = $row1['isbraceletavailable'];
                    $touristid = $row1['id'];
                    $result_arrtourist[] = array(
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "address1" => $address1,
                        "hotelid" => $hotelidt,
                        "nationalityid" => $nationalityid,
                        "mobilenumber" => $mobilenumber,
                        "emailid" => $emailid,
                        "dob" => $dob,
                        "qrcode" => $qrcode,
                        "rfid" => $rfid,
                        "isassigned" => $isassigned,
                        "citizenid" => $citizenid,
                        "provinceid" => $provinceid,
                        "municipalityid" => $municipalityid,
                        "gender" => $gender,
                        "ismaubancitizen" => $ismaubancitizen,
                        "uploadimage" => $uploadimage,
                        "actualimagename" => $actualimagename,
                        "isprimary" => $isprimary,
                        "isrentbracelet" => $isrentbracelet,
                        "isreturningguest" => $isreturningguest,
                        "isbraceletreturned" => $isbraceletreturned,
                        "isbraceletavailable" => $isbraceletavailable,
                        "touristid"=>$touristid
                    );
                }

                // // $conn->next_result();
                // $qr1 = excecutequery("call sp_GetTouristByRegid(".$row['id'].")");
                //refund detail



                $return_arr[] = array(
                    "pax" => $pax,
                    "fromdate" => $fromdate,
                    "todate" => $todate,
                    "numberofdays" => $numberofdays,
                    "totalcharge" => $totalcharge,
                    "hotelid" => $hotelid,
                    "boatid" => $boatid,
                    "ispaymentdone" => $ispaymentdone,
                    "paymentreferencenumber" => $paymentreferencenumber,
                    "qrcode" => $qrcode,
                    "isvipguest" => $isvipguest,
                    "ismailsend" => $ismailsend,
                    "slotid" => $slotid,
                    "ishotelprovideboat" => $ishotelprovideboat,
                    "vehicle" => $vehicle,
                    "parkingnotreq" => $parkingnotreq,
                    "hotelbookingref" => $hotelbookingref,
                    "package"=>$package,
                    "id"=>$id,
                    "editrefnum"=>$editrefnum,
                    "refundrefnum"=>$refundrefnum,
                   
                    "newtotalcharge"=>$newtotalcharge,
                    "partialpayment"=>$partialpayment,
                    "partialpaymentreferencenumber"=>$partialpaymentreferencenumber,
                    "currentdate"=>$currentdate,
                    "istouristvisited"=>$istouristvisited,
                    "isnoshowavailable"=>$isnoshowavailable,
                    "isdaypass"=>$isdaypass,
                    "refundamt"=>$refundamt,
                    "isnoshowrefund"=>$isnoshowrefund,
                    "tourist"=>$result_arrtourist,
                );
            }
            
            
            if(!(empty($return_arr))){
                $result[]=array(
                    "resultkey"=>1,
                    "resultvalue"=>$return_arr
                );
               
            }else{
                $result[]=array(
                    "resultkey"=>0,
                    "resultvalue"=>"Error data not saved"
                );
            }
            echo json_encode($result[0]);
            break;

        case 'checkavailability':
            $query=json_encode($params["data"]);
           //  print_r(("call sp_GetBookingInfoForEdit('".$query."')"));
            $qr = excecutequery("call sp_checkavailability('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $isSlotAvialble = $row['isSlotAvialble'];
               
                $return_arr[] = array(
                    "isSlotAvialble" => $isSlotAvialble
                );
            }
            if(!(empty($return_arr))){
                $result[]=array(
                    "resultkey"=>1,
                    "resultvalue"=>$return_arr
                );
               
            }else{
                $result[]=array(
                    "resultkey"=>0,
                    "resultvalue"=>"No data  found"
                );
            }
            echo json_encode($result[0]);
            break;
            case 'refundpayment':
                $query=json_encode($params["data"]);
                $qr = excecutequery("call sp_refundpayment('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id = $row['id'];
                   
        
                    
        
                    // $id = $row['rowid'];
                    $return_arr[] = array(
                        "rowid" => $id,
                    
                        
                    );
                }
                if(!(empty($return_arr))){
                    $result[]=array(
                        "resultkey"=>1,
                        "resultvalue"=>$return_arr
                    );
                   
                }else{
                    $result[]=array(
                        "resultkey"=>0,
                        "resultvalue"=>"No data  found"
                    );
                }
                echo json_encode($result[0]);
                
                break;

        case 'updatebooking':
            $query=json_encode($params["data"]);
            //echo ("call sp_updatebooking('".$query."')");
            $qr = excecutequery("call sp_updatebooking('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
               
    
                
    
                // $id = $row['rowid'];
                $return_arr[] = array(
                    "rowid" => $id,
                
                    
                );
            }
            if(!(empty($return_arr))){
                $result[]=array(
                    "resultkey"=>1,
                    "resultvalue"=>$return_arr
                );
               
            }else{
                $result[]=array(
                    "resultkey"=>0,
                    "resultvalue"=>"No data  found"
                );
            }
            echo json_encode($result[0]);
            
            break;
        case 'updatenewbooking':
                $query = json_encode($params["data"]);
                $dasa=json_decode($query, true);
                $customer_email=$dasa["touristinfo"][0]["emailid"];
                $customer_name=$dasa["touristinfo"][0]["firstname"];
                $totalchrg=number_format((float)$dasa["totalpaydue"], 2, '.', '');
                //echo ("call sp_updatepartialpayment('".$query."')");
                $qr = excecutequery("call sp_updatepartialpayment('" . $query . "')");
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
                if(!(empty($return_arr))){
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
                    //}else{
                     //live
                   
                   //$digest=_generate_digest($rawdata,'090d30d2335f8bc11cf4c1f921a052ed');
                 
                    //}
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
                    $url= geturl($data,$connectedtolive);
                     //payment sent log
                    // $conn->next_result();
                    $qr = excecutequery("call sp_paymentlog('" .$url. "','".$return_arr[0]["rowid"]."','r')");
                    $return_arr['url'] = $url;
                    $json = json_decode($url, true);
                    if($json['results']['message']=='Success.'){
                        // $conn->next_result();
                        $qr = excecutequery("call sp_updatepartialpaymentreferencenumber('" . $json['results']['data']['reference_number']. "','".$return_arr[0]["rowid"]."','')");
                       
                        
                    }
                    $result[] = array(
                        "resultkey" => 1,
                        "resultvalue" => $return_arr
                    );  
                }else{
                    $result[]=array(
                        "resultkey"=>0,
                        "resultvalue"=>"No data  found"
                    );
                }
                echo json_encode($result[0]);
                
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
      
        //if($connectedtolive==0){
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
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;
     }
?>