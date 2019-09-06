<?php

function getDataAsJson($sFileName){
    $sjData = file_get_contents($sFileName);
    return json_decode($sjData);
}

function saveDataToFile($jData, $sFileName){
    $sjData = json_encode($jData, JSON_PRETTY_PRINT);
    file_put_contents($sFileName, $sjData);
}

function sendErrorMessage( $sErrorMessage , $iLineNumber ){
    echo '{"status":0, "message":"'.$sErrorMessage.'", "line":'.$iLineNumber.'}';
    exit;
  }
  