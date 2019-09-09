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
          
        <a <?= $sClassActive == 'home'?'class="active"':'';?> href="home.php">HOME</a>
        <a <?= $sClassActive == 'properties'?'class="active"':'';?> href="properties.php">BUY</a>
        <a <?= $sClassActive == 'profile'?'class="active"':'';?> href="seller-profile.php">PROFILE</a>
        <a <?= $sClassActive == 'properties'?'class="active"':'';?> href="seller-properties.php">PROPERTIES</a> 
        <a <?= $sClassActive == 'seller-signup'?'class="active"':''; ?> href="seller-signup.php">SIGN UP</a> 
        <a <?= $sClassActive == 'login'?'class="active"':'';?> href="seller-login.php">LOG IN</a>
            
    </nav>