<?php
$jData = getDataAsJson(__DIR__.'/data.json');
session_start();// Starting Session
// Storing Session
$sSeller_check=$_SESSION['login_id'];

$jSeller = $jData->sellers->$sSeller_check;
$login_session =$jSeller;

if(!isset($login_session)){
    header('Location: seller-login.php'); // Redirecting To Login Page
}
?>