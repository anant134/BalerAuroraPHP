<?php
    //Include the necessary library for Ubuntu
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include "qrlib.php";    
    //Set the data for QR
    $code = "Welcome to LinuxHint";
    //check the class is exist or not
    if(class_exists('QRcode'))
    {
        //Generate QR
        QRcode::png($code);
    }else{
        //Print error message
        echo 'class is not loaded properly';
    }
?>