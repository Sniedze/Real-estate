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
       
        <a <?= $sClassActive == 'properties'?'class="active"':'';?> href="home.php">HOME</a>
        <a <?= $sClassActive == 'sell'?'class="active"':'';?> href="seller-login.php">SELL</a> 
        <a <?= $sClassActive == 'seller-signup'?'class="active"':''; ?> href="seller-signup.php">SIGN UP</a> 
        <a <?= $sClassActive == 'login'?'class="active"':'';?> href="seller-login.php">LOG IN</a>
            
    </nav>
   
    