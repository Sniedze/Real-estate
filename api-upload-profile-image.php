<?php
require_once(__DIR__.'/functions.php');

function deleteProfile(){
session_start();
unset($_SESSION['seller']);
session_destroy();
if (isset($_SESSION['seller'])) {
    $sSeller = $_POST['seller'];
};

$jData = getDataAsJson(__DIR__.'/data.json');
unset($jData->sellers->$sSeller);
saveDataToFile($jData, __DIR__.'/data.json');
echo "success";

}