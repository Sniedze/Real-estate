<?php

require_once(__DIR__.'/functions.php');
session_start();
if($_SESSION){
    echo '{"status":1,"message":"success"}';
    header('Location: seller-profile.php');
   
}

if($_POST){
    $sLoginEmail = $_POST['txtLoginEmail'];
    $sLoginPassword = $_POST['txtLoginPassword'];
    $sPasswordRegex = (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $sLoginPassword));
    //Validating email and password
    (function(){
        global $sPasswordRegex;
        if(empty($_POST['txtLoginEmail'])) return;
        if(!filter_var($_POST['txtLoginEmail'], FILTER_VALIDATE_EMAIL)) return;
        if(empty($_POST['txtLoginPassword'])) return;
        if(!$sPasswordRegex || strlen($_POST['txtLoginPassword']) < 8) return;
        
        $jData = getDataAsJson(__DIR__.'/data.json');
        //Checking if user is in the database
        foreach($jData->sellers as $sSellerId=> $jSeller){
            if($jSeller->email == $_POST['txtLoginEmail'] && $jSeller->password == $_POST['txtLoginPassword']){                
                    $_SESSION['seller']=$jSeller;
                    $_SESSION['id']=$sSellerId;
                    header('Location: seller-profile.php');            
            }        
            }     
    })();
    
}

?>