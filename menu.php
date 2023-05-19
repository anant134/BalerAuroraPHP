<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    include("dbconfig.php");
    define ("SECRETKEY", "i2ttourbooking");
    $params = (array) json_decode(file_get_contents('php://input'), TRUE);
    $result_arr=[];
   
    $result=[];
    $requestfor=$params["requestfor"];
    switch ($requestfor) {
        case 'getmenudetail':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getmenudetail('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $menuuuid = $row['menuuuid'];
                $menuname = $row['menuname'];
                $menuid = $row['menuid'];
                $ischeck= $row['ischeck'];
                $return_arr[] = array(
                    "id" => $id,
                    "menuuuid" => $menuuuid,
                    "menuname"=>$menuname,
                    "menuid"=>$menuid,
                    "ischeck"=>$ischeck
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
        

    }



?>