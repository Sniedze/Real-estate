<?php
$sPageTitle = 'Sign up';
$sClassActive = 'signup';

require_once(__DIR__.'/functions.php');



if($_POST){
   
    $sName = $_POST['txtName'];
    $sLastName = $_POST['txtLastName'];
    $sEmail = $_POST['txtEmail'];
    $sPassword = $_POST['txtPassword'];
    $sPasswordRegex = (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $sPassword));
    
    
      
    empty($sName)? sendErrorMessage('Name is missing', __LINE__):
    strlen($sName)<2||strlen($sName)>20? sendErrorMessage('Name min 2 and max 20 characters', __LINE__):
    empty($sLastName)? sendErrorMessage('Last Name is missing', __LINE__):
    strlen($sLastName)<2||strlen($sLastName)>20? sendErrorMessage('Last Name min 2 and max 20 characters', __LINE__):
    empty($sEmail)? sendErrorMessage('Email is missing', __LINE__):
    !filter_var($sEmail, FILTER_VALIDATE_EMAIL)? sendErrorMessage('This is not valid email format', __LINE__):
    empty($sPassword)? sendErrorMessage('Password is missing', __LINE__):
    !$sPasswordRegex || strlen($sPassword) < 8? sendErrorMessage('Password should be at least 8 characters in length and should include at least one upper case letter, and one number.', __LINE__):
           
        $jData = getDataAsJson(__DIR__.'/data.json');        
        $jSeller = new stdClass();
        $jSeller->name = $sName;
        $jSeller->lastName = $sLastName;
        $jSeller->email = $sEmail;
        $jSeller->password = $sPassword;
        $sUniqueSellerId = bin2hex(random_bytes(16));       
        $jData->sellers->$sUniqueSellerId = $jSeller;
        saveDataToFile($jData, __DIR__.'/data.json');
        echo '{"status":1, "message":"Success, seller profile created", "line":'.__LINE__.'}';
        header('Location: seller-login.php?');

    }
