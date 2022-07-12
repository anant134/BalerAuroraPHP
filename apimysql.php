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
        case 'getencryptpassword':
            $hash = openssl_encrypt($params["password"], "AES-128-ECB", SECRETKEY);
            echo($hash) ;
            break;
        case 'getdecryptpassword':
            $plain = openssl_decrypt($params["password"], "AES-128-ECB", SECRETKEY);
            echo($plain) ;
        break;
      
       
        default:
            # code...
        break;
    }


?>