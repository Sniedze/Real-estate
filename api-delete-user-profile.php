<?php
require_once(__DIR__.'/functions.php');
session_start();
unset($_SESSION['id']);
session_destroy();
if (isset($_POST['id'])) {
    $sUserId = $_POST['id'];
};

$jData = getDataAsJson(__DIR__.'/data.json');
unset($jData->users->$sUserId);
saveDataToFile($jData, __DIR__.'/data.json');

header('user-signup.php');
echo "success";





