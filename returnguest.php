<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
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
        case 'vaildatereturnguest':
            //address1,nationalityid,emailid,mobilenumber,citizenid,provinceid,municipalityid,ismaubancitizen
            
            $query=json_encode($params["data"]);
           // print("call sp_vaildatereturnguest('".$query."')");
            $qr = excecutequery("call sp_vaildatereturnguest('".$query."')");
            while ($row = $qr->fetch_assoc()) {
              
                $address1 = $row['address1'];
                $nationalityid = $row['nationalityid'];
                $emailid = $row['emailid'];
                $mobilenumber = $row['mobilenumber'];
                $citizenid = $row['citizenid'];
                $provinceid = $row['provinceid'];
                $municipalityid = $row['municipalityid'];
                $ismaubancitizen = $row['ismaubancitizen'];
                $lastvisited = $row['lastvisited'];
            
                
                $return_arr[] = array(
                    "address1" => $address1,
                    "nationalityid"=>$nationalityid,
                    "emailid"=>$emailid,
                    "mobilenumber"=>$mobilenumber,
                    "citizenid"=>$citizenid,
                    "provinceid"=>$provinceid,
                    "municipalityid"=>$municipalityid,
                    "ismaubancitizen"=>$ismaubancitizen,
                    "lastvisited"=>$lastvisited
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