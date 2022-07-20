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
        case 'getGuestArrived':
            
            $qr = excecutequery("call sp_getGuestArrived('{}')");
            
            while ($row = $qr->fetch_assoc()) {
                $count = $row['count'];
                $mnt = $row['mnt'];
                $dt = $row['dt'];
                $return_arr[] = array(
                    "count" => $count,
                    "mnt" =>$mnt,
                    "dt" =>$dt,
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
        case 'getCollection':
            
            $qr = excecutequery("call sp_getCollection('{}')");
            
            while ($row = $qr->fetch_assoc()) {
                $count = $row['count'];
                $mnt = $row['mnt'];
                $dt = $row['dt'];
                $return_arr[] = array(
                    "count" => $count,
                    "mnt" =>$mnt,
                    "dt" =>$dt,
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
        case 'loaddashboad':
            //{ requestfor: "getslots", data: { flag: "a" } }
            $_data=array("flag"=>"a");
           // $slotreq = array("requestfor"=>"getslots", "data"=>$_data);
            $query=json_encode($_data);
            $slotresult=[];
            $hotelresult=[];
            $feesresult=[];
            $countryresult=[];
            $citizenshipresult=[];
            $provinceresult=[];
            $municipalityresult=[];
            
            $slotqr = excecutequery("call sp_getslots('".$query."')");
            while ($row = $slotqr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $starttime = $row['starttime'];
                $endtime = $row['endtime'];
                $timeinterval=$row["timeinterval"];
                // $boattype=$row["boattype"];
                $slotresult[] = array(
                    "id" => $id,
                    "description" => $description,
                    "starttime" => $starttime,
                    "endtime" => $endtime,
                    "isactive"=>$isactive,
                    "timeinterval"=>$timeinterval,
                    // "boattype"=>$boattype
                );
            }
            $hotelqr = excecutequery("call sp_gethotel('".$query."')");
            while ($row = $hotelqr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $hotelresult[] = array(
                    "id" => $id,
                    "isactive"=>$isactive,
                    "description"=>$description,
                );
            }
            $feesqr = excecutequery("call sp_getfees('".$query."')");
            while ($row = $feesqr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $price = $row['price'];
                $rentprice= $row['rentprice'];
                $feesresult[] = array(
                    "id" => $id,
                    "description" => $description,
                    "isactive"=>$isactive,
                    "price"=>$price,
                    "rentprice"=>$rentprice
                );
            }
            $countryqr = excecutequery("call sp_getcountry('".$query."')");
            while ($row = $countryqr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
            
                $countryresult[] = array(
                    "id" => $id,
                    "isactive"=>$isactive,
                    "description"=>$description
                );
            }
            $citizenshipqr = excecutequery("call sp_getcitizenship('".$query."')");
            while ($row = $citizenshipqr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
            
                $citizenshipresult[] = array(
                    "id" => $id,
                    "isactive"=>$isactive,
                    "description"=>$description
                );
            }
            $provinceqr = excecutequery("call sp_getprovince('".$query."')");
            while ($row = $provinceqr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $country = $row['country'];
                $countryid = $row['countryid'];
            
                $provinceresult[] = array(
                    "id" => $id,
                    "isactive"=>$isactive,
                    "description"=>$description,
                    "country"=>$country,
                    "countryid"=>$countryid
                );
            }
            $municipalityqr = excecutequery("call sp_getmunicipality('".$query."')");
            while ($row = $municipalityqr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $country = $row['country'];
                $countryid = $row['countryid'];
                $province = $row['province'];
                $provinceid = $row['provinceid'];
            
                $municipalityresult[] = array(
                    "id" => $id,
                    "isactive"=>$isactive,
                    "description"=>$description,
                    "country"=>$country,
                    "countryid"=>$countryid,
                    "province"=>$province,
                    "provinceid"=>$provinceid
                );
            }

            $result[]=array(
                "resultkey"=>1,
                "resultvalue"=>array("slotdata"=>$slotresult,
                "hoteldata"=>$hotelresult,
                "feedata"=>$feesresult,
                "country"=>$countryresult,
                "citizenship"=>$citizenshipresult,
                "province"=>$provinceresult,
                "municipality"=>$municipalityresult
                
                )
            );

            echo json_encode($result[0]);
        break;

      }
    
?>