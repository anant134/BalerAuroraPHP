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
        case 'getdiscounts':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getdiscounts('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
                $value = $row['value'];
                $discounttypeid=$row['discounttypeid'];
                $discounttypedesc=$row['discounttypedesc'];
                $vaildtill=$row['vaildtill'];
           
                $return_arr[] = array(
                    "id" => $id,
                    "description" => $description,
                    "isactive"=>$isactive,
                    "value"=>$value,
                    "discounttypeid"=>$discounttypeid,
                    "discounttypedesc"=>$discounttypedesc,
                    "vaildtill"=>$vaildtill

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
        case 'fees':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
            if($dasa["flag"]=="u"){
                $dasa["isactive"]=$dasa["isactive"]=="1"?1:0;
                $query=json_encode($dasa);
            }
            $qr = excecutequery("call sp_fee('".$query."')");
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
        case 'getdiscounttype':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getdiscounttype('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $description = $row['description'];
            
                $return_arr[] = array(
                    "id" => $id,
                    "description" => $description,
                    "isactive"=>$isactive
                   
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