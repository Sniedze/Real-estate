<?php
session_start();
require_once('functions.php');
print_r($_POST);
if(!$_SESSION)return;
$sSellerId = $_SESSION['sellerId'];
$sPropertyId = $_POST['delIndex'];
echo $sSellerId;
echo $sSellerId;
$jData = getDataAsJson('data.json');
unset($jData->sellers->$sSellerId->properties->$sPropertyId);      
saveDataToFile($jData, 'data.json');
//unlink($jData->sellers->$sSellerId->properties->$sPropertyId->image);
echo 'success';
      
