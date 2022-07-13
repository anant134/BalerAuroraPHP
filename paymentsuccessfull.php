<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
include("dbconfig.php");
define("SECRETKEY", "i2ttourbooking");
include("generateqr.php");
include("sendmailbooking.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script >
function printDiv(divName) {
    //  var printContents = document.getElementById(divName).innerHTML;
    //  var originalContents = document.body.innerHTML;

    //  document.body.innerHTML = printContents;

    //  window.print();

    //  document.body.innerHTML = originalContents;


    window.print();
}
</script>
<style>
    @media print {
    html, body {
        height: 99%;    
    }
}

</style>
</head>
<body>


  <?php
  $url=$weburl;
 
//   print_r($weburl);
 
 
   $data = json_decode( file_get_contents('php://input') );
    if (!empty($_POST)){
        $query=json_encode($_POST);
       
        $dasa=json_decode($query, true);
       
          $qr = excecutequery("call sp_getregistrationinfo('" . $dasa["reference_number"] . "')");
        
          //  $qr = excecutequery("call sp_getregistrationinfo('921B7469')");
             while ($row = $qr->fetch_assoc()) {
              if( $dasa["status"]=="success"){
                   echo '<div class="jumbotron text-center" id="printableArea">';
                   echo '<img src="'.$url.'/tourbookingphp/images/smartpay.PNG" height="100px"></br>';
                   echo ' <img src="'.$url.'/tourbookingphp/images/logo.jpeg"  height="100px">';
                   echo '<p>Thank you very much for your booking and reservation</p> ';
                   echo '<p style="margin:0px">Here’s the summary of your Booking Details:</p>';
                   echo ' <p>Booking Reference Number :'.$row["id"].' </p><br>';
                   echo ' <img src="'.$url.'/tourbookingphp/tempdata/'.$row["qrcode"].'" > ';
                   echo '<p style="margin:0px">Date of Tour : '.$row["fromdate"].' to '.$row["todate"].'</p>';
                   echo ' <p style="margin:0px">Primary Guest :'.$row["primaryguest"].'</p>';
                   $otherguest=explode(",", $row["primaryguest"]);
                   for($i = 0;$i<count($otherguest);$i++){
                     if($i==0){
       
                     }else{
                       echo ' <p style="margin:0px">Other Guest :'. $otherguest[$i].'</p>';
                     }
                     
                   }
                   // $boats=explode(",", $row["boatid"]);
                   // for($i = 0;$i<count($boats);$i++){
                   //   $conn->next_result();
                   //   $qr = excecutequery("call sp_getboatbyid('" . $boats[$i] "')");
                    
                   // }
                 
                 //  echo ' <p style="margin:0px">Other Guest :'.$row["other"].'</p>';
                   echo ' <p style="margin:0px">Parking Slots :'.$row["vehicle"].'</p>';
                   echo '<p style="margin:0px">Kindly PRINT or SAVE QR Code and present at the Tourism office at Mauban Quezon Tourist Port </p>';
                   echo ' <p style="margin:0px">Thank you again, for questions and clarifications you may call Mauban Arts, Culture and Tourism (M-ACT) Oﬃce   Contact Nos. 042 7881292 </p>';                         
                   echo '09100716107/09633628861/09608516791/09070201103';
                   echo '<p style="margin:0px">Or Contact Mauban Tourism on Messenger: </p>';
                   echo '<p style="margin:0px"><a href="www.facebook.com/mauban.tourism">www.facebook.com/mauban.tourism </a></p></br>';
       
                   echo '<table class="table">';
                   echo '<thead>';
                   echo '</thead>';
                   echo '<tbody>';
                   echo '<tr>';
                   $conn->next_result();
                   $qr = excecutequery("call sp_getvehicleqrcode('" . $row["id"]. "')");
              
                   //  $qr = excecutequery("call sp_getregistrationinfo('921B7469')");
                      while ($rowqr = $qr->fetch_assoc()) {
                       echo '<td scope="row"><div class="col-sm-3"><img src="'.$url.'/tourbookingphp/tempdata/'.$rowqr["qrcode"].'" >  </div></td>';
                      }
       
                  
                
                   echo '</tr>';
                   echo '</tbody>';
                   echo '</table>';
                 
                 
                 
             }else{
              echo '<p><center>Your booking is <b>NOT YET CONFIRMED</b>, kindly settle the payment within 24 Hours and wait at least 24 Hours to validate your payment</center></p>
                    <p><center>Upon successful posting of your payment you will receive a confirmation e-mail and <b>QR Ticket</b></center></p>
                    <p><center>Thank you very much for your booking </center></p> 
                    <p><center> Mauban Arts Culture and Tourism (M-ACT) ONLINE BOOKING & RESERVATION</center></p>
                    <address>Thank you again, for questions and clarifications you may call
                    Mauban Arts, Culture and Tourism (M-ACT) Oﬃce Contact 
                    Nos.                           
                    09100716107/09633628861/09608516791/09070201103 </address>
                    <p><center> Or Contact Mauban Tourism on Messenger:  </center></p> 
                      <p><center> <a href= "www.facebook.com/mauban.tourism">www.facebook.com/mauban.tourism</a> </center></p> ';
              
            }
          
        
          }
          http_response_code(200);
          exit;

    }
?>
   
 
   
   

<button class="btn btn-default" onclick="printDiv('printableArea')"><i class="fa fa-print" aria-hidden="true" style="    font-size: 17px;"> Print</i></button>
</div>


</body>
</html>
