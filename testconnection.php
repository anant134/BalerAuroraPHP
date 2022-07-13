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
    $qr = excecutequery("call sp_GetBooking()");
    while ($row = $qr->fetch_assoc()) {
        $id = $row['id'];
        $pax = $row['pax'];
        $fromdate = $row['fromdate'];
        $todate = $row['todate'];
        $numberofdays = $row['numberofdays'];
        $numberofvehicle = $row['numberofvehicle'];
        $totalcharge = $row['totalcharge'];
        $hotelid = json_decode($row['hotelid']);
        $boatid = json_decode($row['boatid']);
        $paymentreferencenumber = $row['paymentreferencenumber'];
        $qrcode = $row['qrcode'];
        $timesolt=$row['timesolt'];
        $curdate=$row['curdate'];
        $editable=$row['editable'];
        $return_arr[] = array(
            "id" => $id,
            "pax" =>$pax,
            "fromdate" =>$fromdate,
            "todate" =>$todate,
            "numberofdays" =>$numberofdays,
            "numberofvehicle" =>$numberofvehicle,
            "totalcharge" =>$totalcharge,
            "hotelid" =>$hotelid ,
            "boatid" =>$boatid,
            "paymentreferencenumber" =>$paymentreferencenumber,
            "qrcode" =>$qrcode,
            "timesolt"=>$timesolt,
            "curdate"=>$curdate,
            "editable"=>$editable
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
    
    ?>