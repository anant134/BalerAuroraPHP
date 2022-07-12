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
        case 'savestarttrip':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                //{"flag":"validatetourist","boatid":2,"captainid":2,"touristdata":"[{'a':'sd','b':'asd'},{'a':'asdad','b':'aaa'}]"}
               // echo ("call sp_startendtrip('".$query."')") ;
                $qr = excecutequery("call sp_startendtrip('".$query."')");
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
                        "resultvalue"=>"Error data not saved"
                    );
                }
                echo json_encode($result[0]);
            break;
        case 'save_starttrip':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                //{"flag":"validatetourist","boatid":2,"captainid":2,"touristdata":"[{'a':'sd','b':'asd'},{'a':'asdad','b':'aaa'}]"}
               // echo ("call sp_starttrip('".$query."')") ;
                $qr = excecutequery("call sp_starttrip('".$query."')");
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
                        "resultvalue"=>"Error data not saved"
                    );
                }
                echo json_encode($result[0]);
            break;
            case 'save_endtrip':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                //{"flag":"validatetourist","boatid":2,"captainid":2,"touristdata":"[{'a':'sd','b':'asd'},{'a':'asdad','b':'aaa'}]"}
               // echo ("call sp_starttrip('".$query."')") ;
                $qr = excecutequery("call sp_endtrip('".$query."')");
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
                        "resultvalue"=>"Error data not saved"
                    );
                }
                echo json_encode($result[0]);
            break;
           case 'getalltrip':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                $qr = excecutequery("call sp_getalltrip('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'] ;
                    $createdon =$row['createdon'] ;
                    $username =$row['username'] ;
                    $description =$row['description'] ;
                    $startport =$row['starttripport'] ;
                    $endport =$row['endtripport'] ;
                    $endtripon =$row['endtripon'] ;
                    // $id = $row['rowid'];
                    $return_arr[] = array(
                        "id" => $id,
                        "createdon" => $createdon,
                        "username" => $username,
                        "description"=>$description,
                        "startport"=>$startport,
                        "endport"=>$endport,
                        "endtripon"=>$endtripon
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
        case 'gettripdatabyid':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                $qr = excecutequery("call sp_gettripdatabyid('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'] ;
                    $createdon =$row['createdon'] ;
                    $username =$row['username'] ;
                    $description =$row['description'] ;
                    $startport =$row['starttripport'] ;
                    $endport =$row['endtripport'] ;
                    $endtripon =$row['endtripon'] ;
                    // $id = $row['rowid'];
                    $return_arr[] = array(
                        "id" => $id,
                        "createdon" => $createdon,
                        "username" => $username,
                        "description"=>$description,
                        "startport"=>$startport,
                        "endport"=>$endport,
                        "endtripon"=>$endtripon
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
        
        case 'gettouristdetailbyid':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                //{"flag":"validatetourist","boatid":2,"captainid":2,"touristdata":"[{'a':'sd','b':'asd'},{'a':'asdad','b':'aaa'}]"}
                $qr = excecutequery("call sp_gettouristdetailbyid('".$query."')");
                while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'] ;
                    $createdon =$row['createdon'] ;
                    $boatcaptain =$row['boatcaptain'];
                    $description=$row['description'];
                    $age=$row["age"];
                    $touristname=$row["touristname"];
                    $address1=$row["address1"];
                    $startport=$row["startport"];
                    $endport=$row["endport"];
                    $firstname=$row["firstname"];
                    $lastname=$row["lastname"];
                    $gender=$row["gender"]==0?"Male":"Female";
                    $isrentbracelet=$row["isrentbracelet"];
                    $isreturningguest=$row["isreturningguest"];
                    $isbraceletreturned=$row["isbraceletreturned"];
                    $isbraceletavailable=$row["isbraceletavailable"];
                    $isislandhopping=$row["isislandhopping"];

                    // $id = $row['rowid'];
                    $return_arr[] = array(
                        "id" => $id,
                        "createdon" => $createdon,
                        "boatcaptain" => $boatcaptain,
                        "description" => $description,
                        "age"=>$age,
                        'touristname'=>$touristname,
                        'address1'=>$address1,
                        'startport'=>$startport,
                        'endport'=>$endport,
                        'firstname'=>$firstname,
                        'lastname'=>$lastname,
                        'gender'=>$gender,
                        'isrentbracelet'=>$isrentbracelet,
                        'isreturningguest'=> $isreturningguest,
                        'isbraceletreturned'=>$isbraceletreturned,
                        'isbraceletavailable'=>$isbraceletavailable,
                        'isislandhopping'=>$isislandhopping
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
        case 'gettouristbyregid':
                $query=json_encode($params["data"]);
                $dasa=json_decode($query, true);
                //$qr = excecutequery("call sp_GetTouristByRegid('".$dasa["reg"]."')");
                $qr = excecutequery("call sp_GetTouristByRegid('".$dasa["reg"]."')");
                
                while ($row = $qr->fetch_assoc()) {
                    $id =$row['id'];
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
      
    
    
    }
    
?>