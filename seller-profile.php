<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'profile';
session_start();
print_r($_SESSION);
$sSellerId = $_SESSION['id'];
$jSeller = $_SESSION['seller'];


require_once(__DIR__.'/components/seller-top.php');

?>
<h2>Welcome, <?=$jSeller->name?></h2>
<div id="<?=$sSellerId?>">   
    <form id="profile-details" class="profile-details" method="POST">         
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