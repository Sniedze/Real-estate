<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'profile';
session_start();
$sSellerId = $_SESSION['id'];
$jData = getDataAsJson('data.json');
$jSeller = $jData->sellers->$sSellerId;
require_once(__DIR__.'/components/seller-top.php');

?>
<h2>Welcome, <?=$jSeller->name?></h2>
<div>
    <form id="<?=$sSellerId?>" class="profile-details" method="POST">
        <img id="profile-image" src="<?=$jSeller->profileImage?>">
        <label for="">Upload profile image</label>    
        <input type="file" name="profile-image" id="">
        <input type="text" data-update="name" name="txtNewName" placeholder="Name" value="<?=$jSeller->name?>">
        <input type="text" data-update="lastName" name="txtNewLastName" placeholder="Last Name" value="<?=$jSeller->lastName?>">
        <input type="text" data-update="email" name="txtNewEmail" placeholder="Email" value="<?=$jSeller->email?>">
        <input type="text" data-update="password" name="txtNewPassword" placeholder="New Password" value="<?=$jSeller->password?>">

    </form>
</div>
<a href="upload.php">Upload new property</a>
<a href="logout.php">Log out</a>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="app.js"></script>
</body>
</html>