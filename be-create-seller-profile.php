<?php

require_once(__DIR__.'/functions.php');
if(!$_POST){ 
    return;
}

    $sPassword = $_POST['txtPassword'];
    $sPasswordRegex = (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $sPassword));
       
    (function(){
        global $sPasswordRegex;
        if(empty($_POST['txtName'])) return;
        if(strlen($_POST['txtName'])<2||strlen($_POST['txtName'])>20) return;
        if(empty($_POST['txtLastName'])) return;
        if(strlen($_POST['txtLastName'])<2||strlen($_POST['txtLastName'])>20) return;
        if(empty($_POST['txtEmail'])) return;
        if(!filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL)) return;
        if(empty($_POST['txtPassword'])) return;
        if(!$sPasswordRegex || strlen($_POST['txtPassword']) < 8) return;
           
        $jData = getDataAsJson(__DIR__.'/data.json'); 
        
        foreach($jData->sellers as $jSeller){
            if($jSeller->email == $_POST['txtEmail']){                
                    echo '<h3 class="error-message">This email is already in the system. Please signup with another email.</h3>';          
            return;
        }}
                $jSeller = new stdClass();
                $jSeller->name = $_POST['txtName'];
                $jSeller->lastName = $_POST['txtLastName'];
                $jSeller->email = $_POST['txtEmail'];
                $jSeller->password = $_POST['txtPassword'];
                $sUniqueSellerId = bin2hex(random_bytes(16));       
                $jData->sellers->$sUniqueSellerId = $jSeller;
                saveDataToFile($jData, __DIR__.'/data.json');
                header('Location: seller-login.php?');
               
               
      
    })();
    

    
