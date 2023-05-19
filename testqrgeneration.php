<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    include("dbconfig.php");
    define ("SECRETKEY", "i2ttourbooking");
    include("generateqr.php");
    include("Generateprintqr.php");
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $params = (array) json_decode(file_get_contents('php://input'), TRUE);
    $result_arr=[];
    // $result_arr["resultkey"]=0;
    // $result_arr["resultvalue"]=array();
    $result=[];
   
    $requestfor=$params["requestfor"];
    switch ($requestfor) {
        case 'genQR':
            $filename=random_string(6);
            $array[] =  array(
                "filename" => 'qrr'.$filename.'_',
                "data" =>'1988_0'
                
            );
        
            $qrfiles= genqr($array);
        
            
            echo $qrfiles;
            break;
    }
    
    ?>