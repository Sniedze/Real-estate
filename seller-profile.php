<?php
session_start();
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'seller-login';



include('api-seller-login-session.php');
require_once(__DIR__.'/components/top.php');

?>
<h2>Welcome, <?= $login_session->name?></h2>
<form class="profile-details" method="POST">
<img id="profile-image" src="<?=$login_session->profileImage?>">
    <label for="">Upload profile image</label>    
    <input type="file" name="profile-image" id="">
    <input type="text" name="txtNewName" placeholder="Name" value="<?=$login_session->name?>">
    <input type="text" name="txtNewLastName" placeholder="Last Name" value="<?=$login_session->lastName?>">
    <input type="text" name="txtNewEmail" placeholder="Email" value="<?=$login_session->email?>">
    <input type="text" name="txtNewPassword" placeholder="New Password" value="<?=$login_session->password?>">

</form>


<a href="upload.php">Upload new property</a>
<a href="logout.php">Log out</a>
    
</body>
</html>