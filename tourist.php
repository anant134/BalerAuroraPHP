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
        case 'getalltouristbyticket':
             $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getalltouristbyticket('".$query."')");
            //print(("call sp_getalltouristbyticket('".$query."')"));
            while ($row = $qr->fetch_assoc()) {
                $id= $row['id'];
                $registrationid= $row['registrationid'];
                $firstname= $row['firstname'];
                $middlename= $row['middlename'];
                $lastname= $row['lastname'];
                $address1= $row['address1'];
                $address2= $row['address2'];
                $hotelid= $row['hotelid'];
                $nationalityid= $row['nationalityid'];
                $mobilenumber= $row['mobilenumber'];
                $emailid= $row['emailid'];
                $dob= $row['dob'];
                $qrcode= $row['qrcode'];
                $createdon= $row['createdon'];
                $isassigned= $row['isassigned'];
                $isrentbracelet= $row['isrentbracelet'];
           
                $return_arr[] = array(
                    "id" => $id,
                    "createdon" => $createdon,
                    "qrcode"=>$qrcode,
                    "dob"=>$dob,
                    "emailid"=>$emailid,
                    "mobilenumber"=>$mobilenumber,
                    "nationalityid"=>$nationalityid,
                    "hotelid"=>$hotelid,
                    "address2"=>$address2,
                    "address1"=>$address1,
                    "lastname"=>$lastname,
                    "middlename"=>$middlename,
                    "firstname"=>$firstname,
                    "registrationid"=>$registrationid,
                    "isassigned"=>$isassigned,
                    "isrentbracelet"=>$isrentbracelet
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
        case 'getallreturncard':
                $query=json_encode($params["data"]);
               $qr = excecutequery("call sp_getrentalcards('".$query."')");
               //print(("call sp_getalltouristbyticket('".$query."')"));
               while ($row = $qr->fetch_assoc()) {
                   $id= $row['id'];
                   $registrationid= $row['registrationid'];
                   $firstname= $row['firstname'];
                   $middlename= $row['middlename'];
                   $lastname= $row['lastname'];
                   $address1= $row['address1'];
                   $address2= $row['address2'];
                   $hotelid= $row['hotelid'];
                   $nationalityid= $row['nationalityid'];
                   $mobilenumber= $row['mobilenumber'];
                   $emailid= $row['emailid'];
                   $dob= $row['dob'];
                   $qrcode= $row['qrcode'];
                   $createdon= $row['createdon'];
                   $isassigned= $row['isassigned'];
                   $isrentbracelet= $row['isrentbracelet'];
                   $rfid= $row['rfid'];
              
                   $return_arr[] = array(
                       "id" => $id,
                       "createdon" => $createdon,
                       "qrcode"=>$qrcode,
                       "dob"=>$dob,
                       "emailid"=>$emailid,
                       "mobilenumber"=>$mobilenumber,
                       "nationalityid"=>$nationalityid,
                       "hotelid"=>$hotelid,
                       "address2"=>$address2,
                       "address1"=>$address1,
                       "lastname"=>$lastname,
                       "middlename"=>$middlename,
                       "firstname"=>$firstname,
                       "registrationid"=>$registrationid,
                       "isassigned"=>$isassigned,
                       "isrentbracelet"=>$isrentbracelet,
                       "rfid"=>$rfid,
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
            case 'resetbracelet':
                $query=json_encode($params["data"]);
                $qr = excecutequery("call sp_resetbracelet('".$query."')");
                //print(("call sp_resetbracelet('".$query."')"));
               while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'] ;
                    $errflag =$row['errflag'] ;
                    // $id = $row['rowid'];
                    $return_arr[] = array(
                        "id" => $id,
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
                       "resultvalue"=>"No data  found"
                   );
               }
               echo json_encode($result[0]);
               break;
    }


?>