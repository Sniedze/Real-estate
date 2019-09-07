<?php
//session_start();
//$sSellerId =  $_GET['id'];

//echo $sSellerId;
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'seller-login';

//$jData = getDataAsJson('data.json');
include('api-seller-login-session.php');
require_once(__DIR__.'/components/top.php');
//echo "Welcome, {$jData->sellers->$sSellerId->name}";
?>
<h2>Welcome, <?= $login_session->name?></h2>
<h2>Upload Property</h2>
<a href="upload.php">Upload new property</a>
<a href="logout.php">Log out</a>
    
</body>
</html>