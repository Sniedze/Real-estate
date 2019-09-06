<?php

require_once(__DIR__.'/functions.php');
$sPageTitle = 'User Login';
$sClassActive = 'user-login';
require_once(__DIR__.'/components/top.php');
print_r($_POST);
session_start();
print_r($_SESSION);
// if(!empty($_SESSION)){
//     header('Location: user-profile.php');
// }
$_SESSION['id'] = '745d6fe0da021d9';
$sUserId = $_SESSION['id'];
echo $sUserId;


$jData = getDataAsJson(__DIR__.'/data.json');
$jUser= $jData->users->$sUserId;

if($_POST){
    $sEmail = $_POST['txtEmail'];
    $sPassword = $_POST['txtPassword'];
    
    if($sEmail&&$sPassword){
        

        if($jUser->email==$sEmail&&$jUser->password==$sPassword){            
        header('Location: user-profile.php?id='.$sUserId);  
        }
        else{
            echo 'Input correct Email and password';
        }
}}

require_once(__DIR__.'/components/top.php');
?>

<form action="" method="POST">
    <input type="text" value="u.sniedze@gmail.com" name="txtEmail" placeholder="Email/Username">
    <input type="text" value="555" name="txtPassword" placeholder="Password">
    <button>Log in</button>
</form>
    
</body>
</html>