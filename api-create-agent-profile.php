<?php
$sPageTitle = 'Sign up';
$sClassActive = 'signup';

require_once(__DIR__.'/functions.php');



if($_POST){
    $sName = $_POST['txtName'];
    $sLastName = $_POST['txtLastName'];
    $sEmail = $_POST['txtEmail'];
    $sPassword = $_POST['txtPassword'];
    
      
    empty($sName)? sendErrorMessage('Name is missing', __LINE__):
    strlen($sName)<2||strlen($sName)>20? sendErrorMessage('Name min 2 and max 20 characters', __LINE__):
    empty($sLastName)? sendErrorMessage('Last Name is missing', __LINE__):
    strlen($sLastName)<2||strlen($sLastName)>20? sendErrorMessage('Last Name min 2 and max 20 characters', __LINE__):
           
        $jData = getDataAsJson(__DIR__.'/data.json');        
        $jUser = new stdClass();
        $jUser->name = $sName;
        $jUser->lastName = $sLastName;
        $jUser->email = $sEmail;
        $jUser->password = $sPassword;
        $sUniqueUserId = bin2hex(random_bytes(16));       
        $jData->users->$sUniqueUserId = $jUser;
        saveDataToFile($jData, __DIR__.'/data.json');
        echo '{"status":1, "message":"Success, agent created", "line":'.__LINE__.'}';
        //header("Location: user-login.php?");

    }
