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
         //port
         case 'getmunicipality':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getmunicipality('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $country = $row['country'];
                $countryid = $row['countryid'];
                $province = $row['province'];
                $provinceid = $row['provinceid'];
            
                $return_arr[] = array(
                    "id" => $id,
                    "isactive"=>$isactive,
                    "description"=>$description,
                    "country"=>$country,
                    "countryid"=>$countryid,
                    "province"=>$province,
                    "provinceid"=>$provinceid
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
        case 'municipality':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            if($dasa["flag"]=="u"){
                $dasa["isactive"]=$dasa["isactive"]=="1"?1:0;
                $query=json_encode($dasa);
            }
            $qr = excecutequery("call sp_municipality('".$query."')");
            
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