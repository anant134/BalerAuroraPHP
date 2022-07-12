<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
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
    
        case 'transactionlog':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_gettransactionlog('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $primaryguest = $row['primaryguest'];
                $other = $row['other'];
                $vehicle= $row['vehicle'];
                $email=$row["email"];
                $fromdate=$row["fromdate"];
                $todate=$row["todate"];
                $qrcode=$row["qrcode"];
                $slotid=$row["slotid"];
                $pax=$row["pax"];
                $buybracelet=$row["buybracelet"];
                $rentbracelet=$row["rentbracelet"];
                $hotel=$row["hotel"];
                $mobilenumber=$row["mobilenumber"];
                $paymentreferencenumber=$row["paymentreferencenumber"];
                
                $return_arr[] = array(
                    "id" => $id,
                    "primaryguest"=>$primaryguest,
                    "other"=>$other,
                    "vehicle"=>$vehicle,
                    "email"=>$email,
                    "fromdate"=>$fromdate,
                    "todate"=>$todate,
                    "qrcode"=>$qrcode,
                    "slotid"=>$slotid,
                    "pax"=>$pax,
                    "buybracelet"=>$buybracelet,
                    "rentbracelet"=>$rentbracelet,
                    "hotel"=>$hotel,
                    "mobilenumber"=>$mobilenumber,
                    "paymentreferencenumber"=>$paymentreferencenumber

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
        case 'feebreakdown':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_feebreakdownreport('{}')");
            while ($row = $qr->fetch_assoc()) {
                $pax = $row['pax'];
                $buybracelet = $row['buybracelet'];
                $rentbracelet = $row['rentbracelet'];
                $paymentreferencenumber = $row['paymentreferencenumber'];
                $processingfee = $row['processingfee'];
                $BraceletFee= $row['BraceletFee'];
                $boatcharge=$row["boatcharge"];
                $ETAF=$row["ETAF"];
                $prkchrg=$row["prkchrg"];
                $boatname=$row["boatname"];
                $BoatFee=$row["BoatFee"];
                $totalcharge=$row["totalcharge"];
                $fromdate=$row["fromdate"];
                $todate=$row["todate"];
                $numberofdays=$row["numberofdays"];
                $typeofvehicle=$row["typeofvehicle"];
                $countveh=$row["countveh"];
                $paymentdate=$row["paymentdate"];
                $channel_fee=$row["channel_fee"];
                $return_arr[] = array(
                    "pax" => $pax,
                    "buybracelet"=>$buybracelet,
                    "rentbracelet"=>$rentbracelet,
                    "paymentreferencenumber"=>$paymentreferencenumber,
                    "processingfee"=>$processingfee,
                    "BraceletFee"=>$BraceletFee,
                    "boatcharge"=>$boatcharge,
                    "ETAF"=>$ETAF,
                    "prkchrg"=>$prkchrg,
                    "boatname"=>$boatname,
                    "BoatFee"=>$BoatFee,
                    "totalcharge"=>$totalcharge,
                    "fromdate"=>$fromdate,
                    "todate"=>$todate,
                    "numberofdays"=>$numberofdays,
                    "typeofvehicle"=>$typeofvehicle,
                    "countveh"=>$countveh,
                    "paymentdate"=>$paymentdate,
                    "channel_fee"=>$channel_fee

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
    
    }

?>