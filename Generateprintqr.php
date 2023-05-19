<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("dbconfig.php");
define("SECRETKEY", "i2ttourbooking");
include("generateqr.php");
include("sendmailbooking.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



 function random_string($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
    
        return $key;
    }
    $filename=random_string(6);
    $array[] =  array(
        "filename" => 'qrr'.$filename.'_',
        "data" =>'1988_0'
        
    );

    $qrfiles= genqr($array);

    print_r ($qrfiles);
?>