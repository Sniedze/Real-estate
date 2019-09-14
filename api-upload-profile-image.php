<?php

$file = $_FILES['file']['name'];
$ext = pathinfo($file, PATHINFO_EXTENSION);
$sUniqueImageName= uniqid().'.'.$ext;
move_uploaded_file($_FILES['file']['tmp_name'], __DIR__."/images/$sUniqueImageName");
$sSellerId = $_POST['id'];
$jData = getDataAsJson(__DIR__.'/data.json');
//test with Postman here!!!!!!

$jData->sellers->$sSellerId->profileImage = $sUniqueImageName;
?>