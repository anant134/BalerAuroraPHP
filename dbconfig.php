<?php
//ms sql
// $serverName = "DESKTOP-FKNUV0A";  
// $connectionInfo = array( "Database"=>"datacapturing");  
// $conn = sqlsrv_connect( $serverName, $connectionInfo); 

//my sql


// $dbhost = 'localhost:3309';
// $dbuser = 'root';
// $dbpass = 'root';
// $db='tourbooking';
//"https://maubantourism.smartpay.ph";
//https://tourism-test.smartpay.ph
$weburl='https://tourism-test.smartpay.ph';

$connectedtolive=1;


function excecutequery($sqlquery)
{
    $dbhost = 'mauban-rds.c3vmdc1lq3gg.ap-southeast-1.rds.amazonaws.com';
    $dbuser = 'admin';
    $dbpass = 'MaubanI2t123';
    $db='baleraurora_test';
    // $dbhost = 'localhost';
    // $dbuser = 'root';
    // $dbpass = 'root';
    // $db='baleraurora';
   
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die ("could not connect to mysql");
    $result = $conn->query($sqlquery);
    mysqli_close($conn);
    
    return $result;
}






// if(! $conn ) {
//     die('Could not connect: ' . mysqli_error($conn));
// }else{
//     echo 'Connected successfully';
// }// mysqli_select_db("users") or die ("no database");  
// if( $conn === false )  
// {  
//      echo "Could not connect.\n";  
//      die( print_r( sqlsrv_errors(), true));  
// }else{
//      $sql = "SELECT [id],[username],[password],[createdon],[createdby],[modifiedby],[modifiedon] FROM [datacapturing].[dbo].[tbluser]";  
//      $stmt = sqlsrv_query( $conn, $sql );
//      if( $stmt === false) {
//          die( print_r( sqlsrv_errors(), true) );
//      }
     
//      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
//            echo $row['username'].", ".$row['password']."<br />";
//      }
     
//      sqlsrv_free_stmt( $stmt);
// } 
// sqlsrv_close( $conn); 
?>