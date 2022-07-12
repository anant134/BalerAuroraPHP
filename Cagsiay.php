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
        
        case 'savecagsiaytouristLog':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                //echo ("call sp_savecagsiaylog('".$query."')");
                $qr = excecutequery("call sp_savecagsiaylog('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'] ;
                    $rowid =$row['id'] ;
                    $errflag =$row['errflag'] ;
                    $errmsg =$row['errmsg'] ;
                    // $id = $row['rowid'];
                    $return_arr[] = array(
                        "id" => $id,
                        "errflag"=>$errflag,
                        "errmsg"=>$errmsg,
                        "rowid"=>$rowid 
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
        case 'getcagsiaytouristbyid':
               // $query=json_encode($params["data"]);
                //$dasa=json_decode($query, true);
                //$qr = excecutequery("call sp_GetTouristByRegid('".$dasa["reg"]."')");
                //print("call sp_getcagsiaytouristbyid('".$dasa["id"]."')");
                $qr = excecutequery("call sp_getcagsiaytouristlog()");
                
                while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'];
                    $rowid=$row['id'];
                    $registrationid =$row['registrationid'];
                    $firstname =$row['firstname'];
                    $lastname =$row['lastname'];
                    $address1 =$row['address1'];
                    $address2 =$row['address2'];
                    $hotelid =$row['hotelid'];
                    $nationalityid =$row['nationalityid'];
                    $mobilenumber =$row['mobilenumber'];
                    $emailid =$row['emailid'];
                    $dob =$row['dob'];
                    $qrcode =$row['qrcode'];
                    $citizenid =$row['citizenid'];
                    $provinceid =$row['provinceid'];
                    $municipalityid =$row['municipalityid'];
                    $gender =$row['gender'];
                    $ismaubancitizen =$row['ismaubancitizen'];
                    $uploadimage =$row['uploadimage'];
                    $actualimagename =$row['actualimagename'];
                    $age =$row['age'];
                    $isrentbracelet =$row['isrentbracelet'];
                    $isreturningguest =$row['isreturningguest'];
                    $isbraceletreturned =$row['isbraceletreturned'];
                    $isbraceletavailable =$row['isbraceletavailable'];
                    $isislandhopping =$row['isislandhopping'];
                    $rfid =$row['rfid'];
                    
    
                    $return_arr[] = array(
                        "id" => $id,
                        "rowid"=>$rowid,
                        "registrationid" => $registrationid,
                        "firstname" => $firstname,
                        "lastname" => $lastname,
                        "address1" => $address1,
                        "address2" => $address2,
                        "nationalityid" => $nationalityid,
                        "mobilenumber" => $mobilenumber,
                        "emailid" => $emailid,
                        "dob" => $dob,
                        "qrcode" => $qrcode,
                        "citizenid" => $citizenid,
                        "provinceid" => $provinceid,
                        "municipalityid" => $municipalityid,
                        "gender" => $gender,
                        "ismaubancitizen" => $ismaubancitizen,
                        "uploadimage" => $uploadimage,
                        "actualimagename" => $actualimagename,
                        "age" => $age,
                        "isrentbracelet" => $isrentbracelet,
                        "isreturningguest" => $isreturningguest,
                        "isbraceletreturned" => $isbraceletreturned,
                        "isbraceletavailable" => $isbraceletavailable,
                        "isislandhopping" => $isislandhopping,
                        "rfid"=>$rfid
                        
    
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
                        "resultvalue"=>"No record found"
                    );
                }
                echo json_encode($result[0]);
        break;
        case 'getAllcagsiaytourist':
            // $query=json_encode($params["data"]);
             //$dasa=json_decode($query, true);
             //$qr = excecutequery("call sp_GetTouristByRegid('".$dasa["reg"]."')");
             //print("call sp_getcagsiaytouristbyid('".$dasa["id"]."')");
             $qr = excecutequery("call sp_getcagsiaytouristlog()");
             
             while ($row = $qr->fetch_assoc()) {
               // print($row['id']);
                 $id =$row['id'];
                 $rowid=$row['id'];
                 $registrationid =$row['registrationid'];
                 $firstname =$row['firstname'];
                 $lastname =$row['lastname'];
                 $address1 =$row['address1'];
                 $address2 =$row['address2'];
                 $hotelid =$row['hotelid'];
                 $nationalityid =$row['nationalityid'];
                 $mobilenumber =$row['mobilenumber'];
                 $emailid =$row['emailid'];
                 $dob =$row['dob'];
                 $qrcode =$row['qrcode'];
                 $citizenid =$row['citizenid'];
                 $provinceid =$row['provinceid'];
                 $municipalityid =$row['municipalityid'];
                 $gender =$row['gender'];
                 $ismaubancitizen =$row['ismaubancitizen'];
                 $uploadimage =$row['uploadimage'];
                 $actualimagename =$row['actualimagename'];
                 $age =$row['age'];
                 $isrentbracelet =$row['isrentbracelet'];
                 $isreturningguest =$row['isreturningguest'];
                 $isbraceletreturned =$row['isbraceletreturned'];
                 $isbraceletavailable =$row['isbraceletavailable'];
                 $isislandhopping =$row['isislandhopping'];
                 $rfid =$row['rfid'];
                 
 
                 $return_arr[] = array(
                     "id" => $id,
                     "rowid"=>$rowid,
                     "registrationid" => $registrationid,
                     "firstname" => $firstname,
                     "lastname" => $lastname,
                     "address1" => $address1,
                     "address2" => $address2,
                     "nationalityid" => $nationalityid,
                     "mobilenumber" => $mobilenumber,
                     "emailid" => $emailid,
                     "dob" => $dob,
                     "qrcode" => $qrcode,
                     "citizenid" => $citizenid,
                     "provinceid" => $provinceid,
                     "municipalityid" => $municipalityid,
                     "gender" => $gender,
                     "ismaubancitizen" => $ismaubancitizen,
                     "uploadimage" => $uploadimage,
                     "actualimagename" => $actualimagename,
                     "age" => $age,
                     "isrentbracelet" => $isrentbracelet,
                     "isreturningguest" => $isreturningguest,
                     "isbraceletreturned" => $isbraceletreturned,
                     "isbraceletavailable" => $isbraceletavailable,
                     "isislandhopping" => $isislandhopping,
                     "rfid"=>$rfid
                     
 
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
        case 'savecagsiayexitlog':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                //print("call sp_savecagsiayexitlog('".$query."')");
                $qr = excecutequery("call sp_savecagsiayexitlog('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'] ;
                    $rowid =$row['id'] ;
                    $errflag =$row['errflag'] ;
                    $errmsg =$row['errmsg'] ;
                    // $id = $row['rowid'];
                    $return_arr[] = array(
                        "id" => $id,
                        "errflag"=>$errflag,
                        "errmsg"=>$errmsg,
                        "rowid"=>$rowid 
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