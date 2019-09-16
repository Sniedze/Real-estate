<?php

require_once(__DIR__.'/functions.php');
session_start();
if(isset($_SESSION['user']) && $_SESSION['user'] == 1) {
    //session is set
    header('Location: user-profile.php');
} 

if($_POST){
    $sLoginEmail = $_POST['txtLoginEmail'];
    $sLoginPassword = $_POST['txtLoginPassword'];
    $sPasswordRegex = (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $sLoginPassword));
    //Validating email and password
    (function(){
        global $sPasswordRegex;
        if(empty($_POST['txtLoginEmail'])&&!filter_var($_POST['txtLoginEmail'], FILTER_VALIDATE_EMAIL)) {
            echo ' Please, enter valid email'; 
            return;           
        }
       
        if(empty($_POST['txtLoginPassword'])&&!$sPasswordRegex || strlen($_POST['txtLoginPassword']) < 8){
            echo ' Please, enter valid password';
            return;
        }
                
        $jData = getDataAsJson(__DIR__.'/data.json');
        //Checking if user is in the database
        foreach($jData->users as $sUserId=> $jUser){
            if($jUser->email == $_POST['txtLoginEmail'] && $jUser->password == $_POST['txtLoginPassword']){                
                    $_SESSION['user']=$jUser;
                    $_SESSION['userId']=$sUserId;                   
                    header('Location: user-profile.php');            
            }     
            else{
                echo '<h3 class="error-message">You are not a user. Please sign up first.</h3>';
            }   
            }     
    })();
    
}
