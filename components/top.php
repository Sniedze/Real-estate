<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title><?=$sPageTitle?></title>
</head>
<body>   
    <nav>        
        <img class="logo" src="images/Group.png" alt="">
        <a <?= $sClassActive == 'properties'?'class="active"':'';?> href="index.php">HOME</a>
        <a <?= $sClassActive == 'user-login'?'class="active"':''; ?> href="user-login.php">USER PROFILE</a> 
        <a <?= $sClassActive == 'seller-login'?'class="active"':'';?> href="seller-login.php">SELLER PROFILE</a>
        <a <?= $sClassActive == 'logout'?'class="active"':'';?> href="logout.php">LOG OUT</a> 
            
    </nav>
   
    