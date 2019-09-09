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
    empty($sLoginEmail)?sendErrorMessage('missing email', __LINE__):
    !filter_var($sLoginEmail, FILTER_VALIDATE_EMAIL)?sendErrorMessage('invalid email', __LINE__):
    empty($sLoginPassword)?sendErrorMessage('missing password', __LINE__):
    !$sPasswordRegex || strlen($sLoginPassword) < 8? sendErrorMessage('wrong pasword.', __LINE__):
    
    $jData = getDataAsJson(__DIR__.'/data.json');
    //Checking if user is in the database
    foreach($jData->sellers as $sSellerId=> $jSeller){
           if($jSeller->email == $sLoginEmail && $jSeller->password == $sLoginPassword){                
                //$_SESSION['seller']=$jSeller;
                $_SESSION['id']=$sSellerId;
                header('Location: seller-profile.php');            
        }        
        }     
}

?>