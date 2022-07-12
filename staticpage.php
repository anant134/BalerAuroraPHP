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
        case 'getstaticpages':
            $query=json_encode($params["data"]);
            $qr = excecutequery("call sp_getstaticpages('".$query."')");
            while ($row = $qr->fetch_assoc()) {
                $id = $row['id'];
                $pagedata = $row['pagedata'];
                
           
                $return_arr[] = array(
                    "id" => $id,
                    "pagedata" => $pagedata
                   
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
        case 'addeditpage':
            $query=json_encode($params["data"]);
            $dasa=json_decode($query, true);
          //  print_r("call sp_staticpages(".$dasa["pageid"].",'".$dasa["pagevalue"]."',".$dasa["loginid"].")");
            $qr = excecutequery("call sp_staticpages(".$dasa["pageid"].",'".$dasa["pagevalue"]."',".$dasa["loginid"].")");
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