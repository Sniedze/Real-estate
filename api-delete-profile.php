<?php
require_once(__DIR__.'/functions.php');
session_start();
unset($_SESSION['id']);
session_destroy();
if (isset($_POST['id'])) {
    $sSellerId = $_POST['id'];
};

$jData = getDataAsJson(__DIR__.'/data.json');
unset($jData->sellers->$sSellerId);
saveDataToFile($jData, __DIR__.'/data.json');
echo "success";




