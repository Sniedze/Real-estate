<?php
require_once(__DIR__.'/functions.php');
$sSellerId = $_POST['id'];
$sKeyToUpdate = $_POST['key'];
$sNewValue = $_POST['value'];
$jData->sellers->$sSellerId->$sKeyToUpdate=$sNewValue;


saveDataToFile($jData, __DIR__.'/data.json');
