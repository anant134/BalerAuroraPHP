<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    include("dbconfig.php");
    define ("SECRETKEY", "i2tdatacapturing");
    $params = (array) json_decode(file_get_contents('php://input'), TRUE);
    $result_arr=[];
    $result_arr["resultkey"]=0;
    $result_arr["resultvalue"]=array();
    $requestfor=$params["requestfor"];
    switch ($requestfor) {
        //user
        case 'getuser':
            
            $query = "{call [dbo].[sp_getuser](?,?)}"; //Parameters '?' includes OUT parameters

            $paramsdata = array(
                array($params["flag"], SQLSRV_PARAM_IN),
                array($params["id"], SQLSRV_PARAM_IN)
                
            );

            $result = sqlsrv_query($conn, $query, $paramsdata);
            if (!$result) {
                echo "An error occurred.\n";
                exit;
              }
              $row_count = sqlsrv_has_rows( $result );
              if( $result === false ){
                $result_arr["resultkey"]=0;
                $result_arr["resultvalue"]=sqlsrv_errors();
              }else{
                $_arr=[];
                while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
                    $id=$row["id"];
                    $username=$row["username"]; 
                    $createdon=$row["createdon"]->format('Y-m-d H:i:s');
                    $createdby=$row["createdby"];
                    $isactive=$row["isactive"]==1?true:false; 
                    $modifiedon=$row["modifiedon"];
                    $modifiedby=$row["modifiedby"];
                    array_push($_arr, array(
                        "id"=>$id,
                        "username"=>$username,
                        "isactive"=>$isactive,
                        "createdon"=>$createdon,
                        "createdby"=>$createdby,
                        "modifiedon"=>$modifiedon,
                        "modifiedby"=>$modifiedby
                    ));
                 }
                 if(count($_arr)!=0){
                    $result_arr["resultkey"]=1;
                    $result_arr["resultvalue"]=$_arr;
                }

              }
             // if($row_count>0){
               
               

          //  }
            echo json_encode($result_arr);
            break;
        case 'getencryptpassword':
           
            $hash = openssl_encrypt($params["password"], "AES-128-ECB", SECRETKEY);
            echo($hash) ;
         
            break;
        case 'getdecryptpassword':
            $plain = openssl_decrypt($params["password"], "AES-128-ECB", SECRETKEY);
            echo($plain) ;
        break;
        case 'insertuser':
            // $query = "{call [dbo].[sp_addedituser](?,?,?,?,?,? )}"; 
      
            // $paramsdata = array(
            //     array($params["flag"], SQLSRV_PARAM_IN),
            //     array($params["username"], SQLSRV_PARAM_IN),
            //     array(openssl_encrypt($params["password"], "AES-128-ECB", SECRETKEY), SQLSRV_PARAM_IN),
            //     array($params["id"], SQLSRV_PARAM_IN),
            //     array($params["loggedinuser"], SQLSRV_PARAM_IN),
            //     array($resultid, SQLSRV_PARAM_OUT, SQLSRV_PHPTYPE_INT)
                
            // );
            //  $result = sqlsrv_query($conn, $query, $paramsdata);
             
            $bigintOut = 0;
            $outSql = "{call [dbo].[sp_addedituser](?,?,?,?,?,? )}";
            $result = 8;  
            $params = array(   
                                array($params["flag"], SQLSRV_PARAM_IN),
                                array($params["username"], SQLSRV_PARAM_IN),
                                array(openssl_encrypt($params["password"], "AES-128-ECB", SECRETKEY), SQLSRV_PARAM_IN),
                                array($params["id"], SQLSRV_PARAM_IN),
                                array($params["loggedinuser"], SQLSRV_PARAM_IN),
                                array(&$result, SQLSRV_PARAM_INOUT)  
                           );  
              
            /* Execute the query. */  
            $stmt3 = sqlsrv_query( $conn, $outSql, $params);  
            if( $stmt3 === false )  
            {  
                 echo "Error in executing statement 3.\n";  
                 $result_arr["resultkey"]=0;
                 $result_arr["resultvalue"]=sqlsrv_errors();
            } 
              
            /* Display the value of the output parameter $vacationHrs. */  
            sqlsrv_next_result($stmt3);  
            $result_arr["resultkey"]=1;
            $result_arr["resultvalue"]=$result;   
            echo json_encode($result_arr);
            
        break;
        case 'vaildateuser':
            $query = "{call [dbo].[sp_authenticateuser](?,?)}";

            $paramsdata = array(
                array($params["username"], SQLSRV_PARAM_IN),
                array(openssl_encrypt($params["password"], "AES-128-ECB", SECRETKEY), SQLSRV_PARAM_IN)
                
            );

            $result = sqlsrv_query($conn, $query, $paramsdata);
            if (!$result) {
                echo "An error occurred.\n";
                exit;
              }
              $row_count = sqlsrv_has_rows( $result );
              if( $result === false ){
                $result_arr["resultkey"]=0;
                $result_arr["resultvalue"]=sqlsrv_errors();
              }else{
                $_arr=[];
                while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
                    $id=$row["id"];
                    $username=$row["username"]; 
                    $createdon=$row["createdon"]->format('Y-m-d H:i:s');
                    $createdby=$row["createdby"];
                    $isactive=$row["isactive"]==1?true:false; 
                    $modifiedon=$row["modifiedon"];
                    $modifiedby=$row["modifiedby"];
                    array_push($_arr, array(
                        "id"=>$id,
                        "username"=>$username,
                        "isactive"=>$isactive,
                        "createdon"=>$createdon,
                        "createdby"=>$createdby,
                        "modifiedon"=>$modifiedon,
                        "modifiedby"=>$modifiedby
                    ));
                 }
                 if(count($_arr)!=0){
                    $result_arr["resultkey"]=1;
                    $result_arr["resultvalue"]=$_arr;
                }

              }
             // if($row_count>0){
               
               

          //  }
            echo json_encode($result_arr);
        break;
        case 'registration':
        break;
        default:
            # code...
        break;
   
   
   
   
   
  
        
        }
   
   
   
   
    function encryptStringArray ($stringArray, $key = "bbsinvetor") {
        $s = strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), serialize($stringArray), MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_,');
        return $s;
    }
       
    function decryptStringArray ($stringArray, $key = "bbsinvetor") {
        $s = unserialize(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($stringArray, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "\0"));
        return $s;
    }
?>