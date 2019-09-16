<?php
require_once(__DIR__.'/functions.php');
$sUserId = $_POST['id'];
$sKeyToUpdate = $_POST['key'];
$sNewValue = $_POST['value'];
$jData = getDataAsJson(__DIR__.'/data.json');
$jData->users->$sUserId->$sKeyToUpdate=$sNewValue;
echo $sNewValue;

saveDataToFile($jData, __DIR__.'/data.json');
echo "success";

