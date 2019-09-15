<?php
session_start();
require_once('functions.php');
print_r($_POST);
if(!$_SESSION)return;
$sUserId = $_SESSION['id'];
$sLikedPropertyId = $_POST['delIndex'];
echo $sUserId;
echo $sUserId;
$jData = getDataAsJson('data.json');
unset($jData->users->$sUserId->likedProperties->$sLikedPropertyId);      
saveDataToFile($jData, 'data.json');
unlink($jData->users->$sUserId->likedProperties->$sLikedPropertyId->image);  
echo 'success';
      
