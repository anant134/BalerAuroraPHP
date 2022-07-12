<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: PUT, GET, POST");
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 include("dbconfig.php");
    $result_arr=[];
    $result_arr["resultkey"]=0;
    $result_arr["resultvalue"]=array();
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
      
      $path="myfiles/";//server path
      $oldfile=[];
      $newfile=[];
      $fileiddata=$_POST['fileid'];
      foreach ($_FILES as $key) {
          if($key['error'] == UPLOAD_ERR_OK ){
            
                    $localfilename=$key['name'];
                    $name = $key['name'];
                   
                    $temp = $key['tmp_name'];
                    $size= ($key['size'] / 1000)."Kb";

                    $test = explode('.',$key['name']);
                    $extension = end($test);    
                    $s = getGUIDnoHash();
                    $name =$s.'.'.$extension;
                    $location = 'temp/'.$name;
                   // move_uploaded_file($temp, $location);
                    if(move_uploaded_file($temp, $location))
                    {
                      $_arr=array("name" => $name);
                      $oldfile[] = $localfilename;
                      $newfile[] = $name;
                      $fileid[] = $fileiddata;
                      $uploadedFile = $_FILES['files']['tmp_name'];
                      $destination = 'temp/'.$name;
                      
                    }
                    else
                    {
                       echo "move_uploaded_file failed";
                       exit();
                    }
                    // array_push($_arr,$key['name']);
                    
                    
                    
                   
              //move_uploaded_file($temp, $path . $name);
             
          }else{
              echo $key['error'];
          }
      }

      $length = count($oldfile);
      for ($i = 0; $i < $length; $i++) {
        $_arr=array(
          "oldfilename"=>$oldfile[$i],
          "newfilename"=>$newfile[$i],
          "fileid"=>$fileid[$i]
          );
       

      }
  
     $result_arr["resultkey"]=1;
    $result_arr["resultvalue"]=array(
            "oldfilename"=>$oldfile,
            "newfilename"=>$newfile,
            "fileid"=>$fileid
            );
      echo json_encode($result_arr);
    }
//  if($_FILES['file']['name'] != ''){
//      $test = explode('.', $_FILES['file']['name']);
//      $extension = end($test);    
//      $s = getGUIDnoHash();
//      $name =$s.'.'.$extension;
//      $location = 'uploads/'.$name;
//      move_uploaded_file($_FILES['file']['tmp_name'], $location);
//      $result_arr["resultkey"]=0;
//      $result_arr["resultvalue"]=array(
//       "oldfilename"=>$_FILES['file']['name'],
//       "newfilename"=>$name
//       );


//      echo json_encode($result_arr);
//  }


 function getGUIDnoHash(){
  mt_srand((double)microtime()*10000);
  $charid = md5(uniqid(rand(), true));
  $c = unpack("C*",$charid);
  $c = implode("",$c);
  return substr($c,0,20);
  }
?>