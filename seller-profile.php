<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'profile';
require_once(__DIR__.'/components/seller-top.php');
session_start();
if(!$_SESSION){
    header("Refresh:3; url=seller-signup.php");
    echo "<b><font color='darkred'>YOUR ACCOUNT WAS SUCCESFULLY DELETED !!</font></b>";
}

if(isset($_SESSION['id'])){
    $sSellerId = $_SESSION['id'];
    $jData = getDataAsJson('data.json');
    $jSeller = $jData->sellers->$sSellerId;


    ?>
    <a href="seller-properties.php">Upload new property</a>
    <h2>Welcome, <?=$jSeller->name?></h2>
    <h3>Edit your profile here</h3>

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
<h3 id="profile-deletion-message"></h3>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    </body>
    </html>

