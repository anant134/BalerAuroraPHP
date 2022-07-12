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
          //user
          case 'userauth':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            $dasa["password"]= openssl_encrypt($dasa["password"], "AES-128-ECB", SECRETKEY);
            $query=json_encode($dasa);
          //  print_r("call sp_getuser('".$query."')");
         // echo("call sp_getuser('".$query."')");
            $qr = excecutequery("call sp_getuser('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $username = $row['username'];
                $email = $row['email'];
                $roleid = $row['roleid'];
                $rolename = $row['rolename'];
                $appmenu = $row['appmenu'];
                
                $return_arr[] = array(
                    "id" => $id,
                    "username" => $username,
                    "email"=>$email,
                    "roleid"=>$roleid,
                    "rolename"=>$rolename,
                    "appmenu"=>$appmenu,

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
        case 'getuser':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getuserinfo('".$query."')");
           
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $username = $row['username'];
                $email = $row['email'];
                $roleid = $row['roleid'];
                $roleid = $row['roleid'];
                $rolename = $row['rolename'];
                $ismapped = $row['ismapped'];
                $return_arr[] = array(
                    "id" => $id,
                    "username" => $username,
                    "isactive"=>$isactive,
                    "email"=>$email,
                    "roleid"=>$roleid,
                    "rolename"=>$rolename,
                    "ismapped"=>$ismapped,
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
        case 'getalltouristbyid':
                $query=json_encode($params["data"]);
                    // print_r("call sp_gettouristinfobyrfid('".$query."')");
                $qr = excecutequery("call sp_gettouristinfobyrfid('".$query."')");
                    while ($row = $qr->fetch_assoc()) {
                        $id=$row["id"];
                        $registrationid=$row["registrationid"];
                        $result_arrtourist=[];
                        // $conn->next_result();
                        $qr1 = excecutequery("call sp_GetTouristByRegid(".$row['registrationid'].")");
                        
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
                        $return_arr[] = array(
                            "id" => $id,
                            "registrationid" => $registrationid,
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
       case 'getalltouristforendtrip':
                $query=json_encode($params["data"]);
                $qr = excecutequery("call sp_getalltouristforendtrip('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $triphdid=$row["triphdid"];
                    $boatid=$row["boatid"];
                    $startport=$row["startport"];
                    $endport=$row["endport"];
                    $firstname=$row["firstname"];
                    $lastname=$row["lastname"];
                    $touristid=$row["touristid"];
                    $rfid=$row["rfid"];
                    $tripid=$row["triphdid"];
                    $return_arr[] = array(
                        "triphdid" => $triphdid,
                        "boatid" => $boatid,
                        "firstname"=>$firstname,
                        "lastname"=>$lastname,
                        "touristid"=>$touristid,
                        "rfid"=>$rfid,
                        "boatcaptain"=>$boatcaptain,
                        "startport"=>$startport,
                        "endport"=>$endport,
                        "triphdid"=>$triphdid
                       
                        
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
        case 'gettouristvaildationforendtrip':
                $query=json_encode($params["data"]);
                $qr = excecutequery("call sp_gettouristvaildationforendtrip('".$query."')");
                    while ($row = $qr->fetch_assoc()) {
                        $id=$row["id"];
                        $tripid=$row["tripid"];
                        $firstname=$row["firstname"];
                        $lastname=$row["lastname"];
                        $touristid=$row["touristid"];
                        $rfid=$row["rfid"];
                        $boatcaptain=$row["boatcaptain"];
                        $bcrfid=$row["bcrfid"];
                        $return_arr[] = array(
                            "id" => $id,
                            "tripid" => $tripid,
                            "firstname"=>$firstname,
                            "lastname"=>$lastname,
                            "touristid"=>$touristid,
                            "rfid"=>$rfid,
                            "boatcaptain"=>$boatcaptain,
                            "bcrfid"=>$bcrfid
                           
                            
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
        case 'getalltouristbyidwithvaildation':
            $query=json_encode($params["data"]);
            // print_r("call sp_gettouristinfobyrfid('".$query."')");
           // echo("call sp_get_tourist_info_by_rfid('".$query."')");
            $qr = excecutequery("call sp_get_tourist_info_by_rfid('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id=$row["id"];
                    $registrationid=$row["registrationid"];
                    $errflag=$row["errflag"];
                    $rowid=$row["rowid"];
                    $errmsg=$row["errmsg"];
                    $result_arrtourist=[];
                  
                    $return_arr[] = array(
                        "id" => $id,
                        "registrationid" => $registrationid,
                        "tourist"=>$result_arrtourist,
                        "errflag"=>$errflag,
                        "errmsg"=>$errmsg,
                        "rowid"=>$rowid,
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

            
        case 'gettouristvaildationforendtrip':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_gettouristvaildationforendtrip('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id=$row["id"];
                    $tripid=$row["tripid"];
                    $firstname=$row["firstname"];
                    $lastname=$row["lastname"];
                    $touristid=$row["touristid"];
                    $rfid=$row["rfid"];
                    $boatcaptain=$row["boatcaptain"];
                    $bcrfid=$row["bcrfid"];
                    $return_arr[] = array(
                        "id" => $id,
                        "tripid" => $tripid,
                        "firstname"=>$firstname,
                        "lastname"=>$lastname,
                        "touristid"=>$touristid,
                        "rfid"=>$rfid,
                        "boatcaptain"=>$boatcaptain,
                        "bcrfid"=>$bcrfid
                    
                        
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
                
        
                case 'gettouristvaildation':
                $query=json_encode($params["data"]);
               // print_r("call sp_gettouristinfobyrfid('".$query."')");
                $qr = excecutequery("call sp_gettouristinfobyrfid('".$query."')");
              
         
         
                       while ($row = $qr->fetch_assoc()) {

                        
                        $id=$row["id"];
                        $registrationid=$row["registrationid"];
                        $firstname=$row["firstname"];
                        $middlename=$row["middlename"];
                        $lastname=$row["lastname"];
                        $emailid=$row["emailid"];
                        $rfid=$row["rfid"];
                        $age=$row["age"];
                        $address1=$row["address1"];
                        $gender=$row["gender"]==0?"Male":"Female";
                        $ismaubancitizen=$row["ismaubancitizen"];
                        $reguid=$row["reguid"];
                        $touristuid=$row["touristuid"];
                        $touristcount=$row["touristcount"];
                        $isrentbracelet=$row["isrentbracelet"];
                        $isreturningguest=$row["isreturningguest"];                        
                       
                        $isbraceletreturned=$row["isbraceletreturned"];
                        $isbraceletavailable=$row["isbraceletavailable"];
                        $isislandhopping=$row["isislandhopping"];
                        $rfid=$row["rfid"];
                         

                        
                        $return_arr[] = array(
                            "id" => $id,
                            "registrationid" => $registrationid,
                            "firstname"=>$firstname,
                            "middlename"=>$middlename,
                            "lastname"=>$lastname,
                            "emailid"=>$emailid,
                            "rfid"=>$rfid,
                            "age"=>$age,
                            "address1"=>$address1,
                            "ismaubancitizen"=>$ismaubancitizen,
                            "reguid"=>$reguid,
                            "touristuid"=>$touristuid,
                            "touristcount"=>$touristcount,
                            "gender"=>$gender,
                            "isrentbracelet"=>$isrentbracelet,
                            "isbraceletreturned"=>$isbraceletreturned,
                            "isbraceletavailable"=>$isbraceletavailable,
                            "isislandhopping"=>$isislandhopping,
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
                        "resultvalue"=>"No data  found"
                    );
                }
                echo json_encode($result[0]);
                break;
        
                case 'getboatcaptainvaildation':
                $query=json_encode($params["data"]);
                $qr = excecutequery("call sp_getboatcaptainvaildation('".$query."')");
               
                while ($row = $qr->fetch_assoc()) {
                    $rowid =$row['rowid'] ;
                    $id =$row['id'] ;
                    $errflag =$row['errflag'] ;
                    $errmsg =$row['errmsg'] ;
                    $isactive = $row['isactive'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $roleid = $row['roleid'];
    
                    $return_arr[] = array(
                        "id" => $id,
                        "rowid"=>$rowid,
                        "username" => $username,
                        "isactive"=>$isactive,
                        "email"=>$email,
                        "roleid"=>$roleid,
                        "errflag"=>$errflag,
                        "errmsg"=>$errmsg,


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
        case 'user':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            $dasa["password"]= openssl_encrypt($dasa["password"], "AES-128-ECB", SECRETKEY);
          
            if($dasa["flag"]=="u"){
                $dasa["isupdatepassword"]="1";
                $dasa["isactive"]=$dasa["isactive"]=="1"?1:0;
               if($dasa["password"]== "qx3knwnA7iFTdpg517drfQ==")
               {
                $dasa["isupdatepassword"]="0";
               } 
            }
            $query=json_encode($dasa);
           // echo("call sp_user('".$query."')");
            $qr = excecutequery("call sp_user('".$query."')");
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
        case 'registerrfid':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            $dasa["isrented"]=$dasa["isrented"]=="1"?1:0;
            $query=json_encode($dasa);
            $qr = excecutequery("call sp_registerrfid('".$query."')");
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
        case 'getrfids':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                $dasa["isrented"]=$dasa["isrented"]=="1"?1:0;
                $query=json_encode($dasa);
                $qr = excecutequery("call sp_getrfids('".$query."')");
               
                while ($row = $qr->fetch_assoc()) {
                    $id = $row['id'];
                    $isactive = $row['isactive'];
                    $rfid = $row['rfid'];
                    $isrented = $row['isrented'];
    
                    $return_arr[] = array(
                        "id" => $id,
                        "rfid" => $rfid,
                        "isactive"=>$isactive,
                        "isrented"=>$isrented
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
        case 'getmenu':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getmenu('".$query."')");
            //md.id, md.menuuuid,md.menuname,md.menuid,m.menuname as menumaster 
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $menuuuid = $row['menuuuid'];
                $menuname = $row['menuname'];
                $menuid = $row['menuid'];
                $menumaster = $row['menumaster'];
              

                $return_arr[] = array(
                    "id" => $id,
                    "menuuuid" => $menuuuid,
                    "menuname"=>$menuname,
                    "menuid"=>$menuid,
                    "menumaster"=>$menumaster,
                    
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
        case 'vaildateuserbypasscode':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            $dasa["passcode"]= openssl_encrypt($dasa["passcode"], "AES-128-ECB", SECRETKEY);
            $query=json_encode($dasa);
            $qr = excecutequery("call sp_getvaildateuserbypasscode('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $return_arr[] = array(
                    "id" => $id
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
        case 'getallregisterrfid':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getallregisterrfid('".$query."')");
            
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $rfid = $row['rfid'];
                $isrented = $row['isrented'];
                $return_arr[] = array(
                    "id" => $id,
                    "rfid" => $rfid,
                    "isactive"=>$isactive,
                    "isrented"=>$isrented
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