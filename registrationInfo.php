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

<form action="" method="post">
  Booking Ref #: <input name="example" type="text" /><br>
  <input name="submit" type="submit" /><br>


        <?php
        function  geturl($url,$connectedtolive){
            $curl = curl_init();
            if($connectedtolive==0){
            $HTTPHEADER =array(
                // 'Authorization: Bearer dypfHwt0s7QZ8XIh',
                // 'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
                );
            }else{
                $HTTPHEADER =array(
                        // 'Authorization: Bearer iCA5gFJkrwLUZ4jW',
                        // 'Cookie: ci_session=dnh8nqmon39u2446b4dn003vat'
                    );
            }
            //https://api-test.smartpay.net.ph/order
            //https://api.smartpay.net.ph/order
        
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_POSTFIELDS => array('' => ''),
                // CURLOPT_HTTPHEADER => array(
                //   'Authorization:  Bearer iCA5gFJkrwLUZ4jW',
                //   'Cookie: ci_session=6gp7g6nmlhrf8g8cogqpma9ld5'
                // ),
        
                    CURLOPT_HTTPHEADER => $HTTPHEADER,
        
                ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
         }
        if (isset($_POST['submit'])) {
          
          
            $example = $_POST['example'];
            $parking= 0;
            $boatcost=0;
            echo '<table class="table"><thead><tr><td>Booking id</td><td>Primary Guest</td><td>Pax</td><td>Parking</td><td>Boat Cost</td><td>Amount Collected</td></tr></thead><tbody>';
            $qr = excecutequery("call sp_getregistrationinfo('" . $example . "')");
            
                while ($row = $qr->fetch_assoc()) {
                    $parking+=$row['vehcost'];
                    $boatcost+=$row['boatcost'];
                    echo '<tr><td>'.$row['id'].'</td><td>'.$row['primaryguest'].'</td><td>'.$row['pax'].'</td><td>'.$row['vehcost'].'</td><td>'.$row['boatcost'].'</td><td>'.$row['totalcharge'].'</td></tr>';
                    
                }
            echo '</tbody></table>';
            $qr1 = excecutequery("call sp_getTouristInfoByRefnum('" . $example . "')");
            echo '<table class="table"><thead><tr><td>Name</td><td>dob</td><td>age</td><td>isrentbracelet</td><td>isdiscount</td><td>bracelet</td><td>Environment</td><td>sum amt</td><td>discount amt</td></tr></thead><tbody>';
            $disamt=0;
            $totalamt=0;
            $finalamt=0;
            while ($row1 = $qr1->fetch_assoc()) {
                echo '<tr><td>'.$row1['firstname'].'</td><td>'.$row1['dob'].'</td><td>'.$row1['age'].'</td><td>'.$row1['isrentbracelet'].'</td><td>'.$row1['isdiscount'].'</td><td>'.$row1['bracelet'].'</td><td>'.$row1['Environmentchr'].'</td><td>'.$row1['sumamt'].'</td><td>'.$row1['discountamt'].'</td></tr>';
                $disamt+=$row1['discountamt'];
                $totalamt+=$row1['sumamt'];
                };
            }
            $url="https://maubantourism.smartpay.ph/tourbookingphp/checkpaymentstatus.php?reference_number=".$example;
            $url= geturl($url,1);
            $response=json_decode($url, true);
            $finalamt=($totalamt+$parking+$boatcost)-$disamt;
            echo '</tbody></table><br>';
            echo 'Total Amount:'.$totalamt.'<br>';
            echo 'Parking:'.$parking.'<br>';
            echo 'Boat:'.$boatcost.'<br>';
            echo 'Channel fee:'.$response['results']['data']['channel_fee'].'<br>';
            echo 'Total Discount:'.($disamt*-1).'<br>';
            echo 'Total Final:'. $finalamt.'<br>';
           
           // print_r( $response['results']['data']['channel_fee']);
           // {"status":true,"code":200,"results":{"data":{"reference_number":"SP00001816","merchant_order_no":"196933","amount":"2164.00","convinience_fee":"0.00","channel_fee":"35.00","customer_email":"fallergel@gmail.com","customer_mobile_number":"","customer_name":"Gel","status":"success","created_at":"2022-01-04 11:16:10","paid_at":"2022-01-04 11:21:15"},"message":"Success."}}
        
        ?>
    

 
</form>
   
   


</body>
</html>
