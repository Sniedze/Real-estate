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
        <div><a <?= $sClassActive == 'home'?'class="active"':'';?> href="home.php">HOME</a></div>
        <div><a <?= $sClassActive == 'properties'?'class="active"':'';?> href="properties.php">BUY</a></div>
        <div><a <?= $sClassActive == 'sell'?'class="active"':'';?> href="sell.php">SELL</a></div> 
        <div><a <?= $sClassActive == 'signup'?'class="active"':''; ?> href="user-signup.php">SIGN UP</a></div> 
        <div><a <?= $sClassActive == 'login'?'class="active"':'';?> href="user-login.php">LOG IN</a></div>
        
    </nav>
    