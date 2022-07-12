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
        case 'getvehicle':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getvehicle('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $typeofvehicle = $row['typeofvehicle'];
                $amount = $row['amount'];
           
                $return_arr[] = array(
                    "id" => $id,
                    "typeofvehicle" => $typeofvehicle,
                    "isactive"=>$isactive,
                    "amount"=>$amount
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
        break;
        case 'vehicle':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            if($dasa["flag"]=="u"){
                $dasa["isactive"]=$dasa["isactive"]=="1"?1:0;
                $query=json_encode($dasa);
            }
            $qr = excecutequery("call sp_vehicle('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id =$row['rowid'] ;
                $errflag =$row['errflag'] ;
                // $id = $row['rowid'];
                $return_arr[] = array(
                    "rowid" => $id,
                    "errflag"=>$errflag
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
        case 'getalltouristvehicle':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            $dasa["redeemon"]= date("Y-m-d");
            $query=json_encode($dasa);
            $qr = excecutequery("call sp_getalltouristvehicle('".$query."')");
           // print ("call sp_getalltouristvehicle('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $redeemed = $row['redeemed'];
                $registrationid = $row['registrationid'];
                $transactionid = $row['transactionid'];
                $createdon = $row['createdon'];
                $redeemon = $row['redeemon'];
                $outtime = $row['outtime'];
                $platenumber = $row['platenumber'];
                $vehicleid = $row['vehicleid'];
               
                $return_arr[] = array(
                    "id" => $id,
                    "redeemed" => $redeemed,
                    "registrationid"=>$registrationid,
                    "transactionid"=>$transactionid,
                    "createdon" => $createdon,
                    "redeemon"=>$redeemon,
                    "outtime"=>$outtime,
                    "platenumber" => $platenumber,
                    "vehicleid"=>$vehicleid
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
        break;
        case 'redeemtouristvehicle':
            $query=json_encode($params["data"]);
            // $dasa=json_decode($query, true);
            // if($dasa["flag"]=="u"){
            //     $dasa["isactive"]=$dasa["isactive"]=="1"?1:0;
            //     $query=json_encode($dasa);
            // }
            $qr = excecutequery("call sp_vehicle('".$query."')");
          //  print("call sp_vehicle('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id =$row['rowid'] ;
                $errflag =$row['errflag'] ;
                // $id = $row['rowid'];
                $return_arr[] = array(
                    "rowid" => $id,
                    "errflag"=>$errflag
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

    }



?>