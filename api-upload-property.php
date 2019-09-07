<?php
session_start();
echo $_SESSION['login_id'];
$sUserId = $_SESSION['login_id'];
require_once(__DIR__.'/functions.php');
if($_POST){
echo "<div>SIZE: {$_FILES['myFile']['size']}</div>";
echo "<div>NAME: {$_FILES['myFile']['name']}</div>";
echo "<div>TYPE: {$_FILES['myFile']['type']}</div>";
echo "<div>TMP NAME: {$_FILES['myFile']['tmp_name']}</div>";
$file = $_FILES['myFile']['name'];
$ext = pathinfo($file, PATHINFO_EXTENSION);

$sUniqueImageName= uniqid().'.'.$ext;
move_uploaded_file($_FILES['myFile']['tmp_name'], __DIR__."/images/$sUniqueImageName");

$sPrice = $_POST['txtPrice'];
$jProperty = new stdClass();
$jProperty->price = intval($sPrice);
$jProperty->image = $sUniqueImageName;

$jProperties = getDataAsJson(__DIR__.'/data.json');
print_r($jProperties);
$sPropertyUniqueId = uniqid();
$jProperties->users->$sUserId->properties->$sPropertyUniqueId = $jProperty;
saveDataToFile($jProperties, __DIR__.'/data.json');
header('Location: user-properties.php');}


?>