<?php
session_start();
$sUserId = $_SESSION['id'];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Uploading</title>
</head>
<body>
    <nav>        
        <div><a  href="home.php">HOME</a></div>
        <div><a  href="properties.php">BUY</a></div>
        <div><a  href="sell.php">SELL</a></div> 
        <div><a  href="user-signup.php">SIGN UP</a></div> 
        <div><a  href="user-login.php">LOG IN</a></div>
        
    </nav>
<h2>Upload Property</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="txtPrice" placeholder="Price">
    <input type="file" name="myFile">
    <button>UPLOAD</button>

</form>
    
</body>
</html>