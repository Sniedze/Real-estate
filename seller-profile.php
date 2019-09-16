<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'seller-login';
require_once(__DIR__.'/components/top.php');
session_start();
if(!$_SESSION){
    header('Location: seller-signup.php');
    return;
}

  
    $sSellerId = $_SESSION['sellerId'];
    $jData = getDataAsJson('data.json');
    $jSeller = $jData ->sellers->$sSellerId;


    ?>
    <main>
    <header>       
        <h2 class="welcome-message">Welcome, <?=$jSeller->name?></h2>
        <a href="seller-properties.php">Upload new property</a>
    </header>
    
    
    <div id="form-container" class="form-container"> 
            <h2>Edit your profile here</h2>  
            <form id="<?=$sSellerId?>" class="profile-details form" method="POST">         
                <input class="input" type="text" data-update="name" name="txtNewName" placeholder="Name" value="<?=$jSeller->name?>">
                <input class="input"type="text" data-update="lastName" name="txtNewLastName" placeholder="Last Name" value="<?=$jSeller->lastName?>">
                <input class="input"type="email" data-update="email" name="txtNewEmail" placeholder="Email" value="<?=$jSeller->email?>">
                <input class="input"type="text" data-update="password" name="txtNewPassword" placeholder="New Password" value="<?=$jSeller->password?>">
            <button class="delete" id="delete-profile-button"; return false; >DELETE PROFILE</button>
        </form>
    </div>
    <?php



?>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <script src="scripts/update-profile.js"></script>
    </body>
    </html>

