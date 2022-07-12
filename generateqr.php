<?php    


function   genqr($data){
   
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'tempdata'.DIRECTORY_SEPARATOR;
   
//html PNG location prefix
$PNG_WEB_DIR = 'tempdata/';

include "qrlib.php";    

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);


$filename = $PNG_TEMP_DIR.'test.png';

//processing form input
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';

$matrixPointSize = 4;
// $filenamestartdata=explode(",", $filenamestart);
// for($i = 0;$i<count($filenamestartdata);$i++){
//     $newfilename=$filenamestartdata[$i].md5(''.$data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).$i.'.png';

//     $filename = $PNG_TEMP_DIR.$newfilename;
//     QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);  
    
// }(
$newfilenamearr = [];
for ($i = 0; $i < count($data); $i++) {
    $newfilename=$data[$i]["filename"].md5(''.$data[$i]["data"].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).$i.'.png';
    $filename = $PNG_TEMP_DIR.$newfilename;
    QRcode::png($data[$i]["data"], $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
    $newfilenamearr[]=array("qrfilename" =>$newfilename,"vehid"=>""); 
}

//$touristqr='qr_';

return   $newfilenamearr ;
}

    