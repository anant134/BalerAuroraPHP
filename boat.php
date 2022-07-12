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
        case 'getboat':
            $query=json_encode($params["data"]);
          //  print_r(("call sp_getboat('".$query."')"));
            $qr = excecutequery("call sp_getboat('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $capacity = $row['capacity'];
                $price = $row['price'];
                $ownername = $row['ownername'];
                $twowayprice = $row['twowayprice'];
                $status = $row['status'];
                $slotid = $row['slotid'];

                $return_arr[] = array(
                    "id" => $id,
                    "description" => $description,
                    "isactive"=>$isactive,
                    "ownername"=>$ownername,
                    "capacity"=>$capacity,
                    "price"=>$price,
                    "twowayprice"=>$twowayprice,
                    "status"=>$status,
                    "slotid"=>$slotid
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
        case 'getboatcapacity':
            $query=json_encode($params["data"]);
            //  print_r(("call sp_getboat('".$query."')"));
            $qr = excecutequery("call sp_getboatcapacity('".$query."')");
           // print_r(("call sp_getboatcapacity('".$query."')"));
            while ($row = $qr->fetch_assoc()) {
                $capacity = $row['capacity'];
                $boatcount = $row['boatcount'];
                $twowayprice = $row['twowayprice'];
                $return_arr[] = array(
                    "capacity" => $capacity,
                    "boatcount" => $boatcount,
                    "twowayprice"=>$twowayprice
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
        case 'checkboatavailability':
              $query=json_encode($params["data"]);
             // print_r(("call sp_checkboatavailability('".$query."')"));
              $qr = excecutequery("call sp_checkboatavailability('".$query."')");
              while ($row = $qr->fetch_assoc()) {
                $boatid = $row['boatid'];
                $slotid = $row['slotid'];
                $return_arr[] = array(
                    "boatid" => $boatid,
                    "slotid"=>$slotid
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
        case 'boat':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            if($dasa["flag"]=="u"){
                $dasa["isactive"]=$dasa["isactive"]=="1"?1:0;
                $query=json_encode($dasa);
            }
           
            $qr = excecutequery("call sp_boat('".$query."')");
          //  print ("call sp_boat('".$query."')");
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
        case 'getboatcaptain':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getboatcaptain('".$query."')");
          //  print (("call sp_getboatcaptain('".$query."')"));
            while ($row = $qr->fetch_assoc()) {
                $username =$row['username'] ;
                $email =$row['email'] ;
                $id =$row['id'] ;
                // $id = $row['rowid'];
                $return_arr[] = array(
                    "username" => $username,
                    "email" => $email,
                    "id"=>$id
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