<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Profile';
$sClassActive = 'profile';
require_once(__DIR__.'/components/top.php');
session_start();
if(!$_SESSION){
    header('Location: seller-signup.php');
    
}

if($_SESSION){
    $sSellerId = $_SESSION['id'];
    $jSeller =$_SESSION['seller'];


    ?>
    <header>       
        <h2>Welcome, <?=$jSeller->name?></h2>
        <a href="seller-properties.php">Upload new property</a>
    </header>
    

    <div id="form-container" class="form-container"> 
            <h3>Edit your profile here</h3>  
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
<h3 id="profile-deletion"></h3>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    </body>
    </html>

