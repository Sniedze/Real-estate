<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'profile';
require_once(__DIR__.'/components/seller-top.php');
session_start();
if(!isset($_SESSION['id'])){
    header("Refresh:5; url=seller-signup.php");
    echo "<b><font color='red'>YOUR ACCOUNT WAS SUCCESFULLY DELETED !!</font></b>";
}

if(isset($_SESSION['id'])){
    $sSellerId = $_SESSION['id'];
    $jData = getDataAsJson('data.json');
    $jSeller = $jData->sellers->$sSellerId;


    ?>
    <h2>Welcome, <?=$jSeller->name?></h2>
    <a href="upload.php">Upload new property</a>
    <a href="logout.php">Log out</a>
    <div id="form-container">   
        <form id="<?=$sSellerId?>" class="profile-details" method="POST">         
            <input type="text" data-update="name" name="txtNewName" placeholder="Name" value="<?=$jSeller->name?>">
            <input type="text" data-update="lastName" name="txtNewLastName" placeholder="Last Name" value="<?=$jSeller->lastName?>">
            <input type="text" data-update="email" name="txtNewEmail" placeholder="Email" value="<?=$jSeller->email?>">
            <input type="text" data-update="password" name="txtNewPassword" placeholder="New Password" value="<?=$jSeller->password?>">
            <button class="delete" id="delete-profile-button"; return false; >DELETE PROFILE</button>
        </form>
    </div>
    <?php
}


?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    </body>
    </html>

