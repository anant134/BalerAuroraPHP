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
        case 'getdestination':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getdestination('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $isactive = $row['isactive'];
                $name = $row['name'];
            
                $return_arr[] = array(
                    "id" => $id,
                    "name" => $name,
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
        case 'destination':
            break;
    }
    ?>