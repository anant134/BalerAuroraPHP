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
        case 'getGuestArrived':
            
            $qr = excecutequery("call sp_getGuestArrived('{}')");
            
            while ($row = $qr->fetch_assoc()) {
                $count = $row['count'];
                $mnt = $row['mnt'];
                $dt = $row['dt'];
                $return_arr[] = array(
                    "count" => $count,
                    "mnt" =>$mnt,
                    "dt" =>$dt,
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
        case 'getCollection':
            
            $qr = excecutequery("call sp_getCollection('{}')");
            
            while ($row = $qr->fetch_assoc()) {
                $count = $row['count'];
                $mnt = $row['mnt'];
                $dt = $row['dt'];
                $return_arr[] = array(
                    "count" => $count,
                    "mnt" =>$mnt,
                    "dt" =>$dt,
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