<?php
$sPageTitle = 'User Login';
$sClassActive = 'user-login';
include(__DIR__.'/api-seller-login.php');

if(isset($_SESSION['login_id'])){
    echo '{"status":1,"message":"success"}';
    header('Location:   seller-profile.php');
   
}
require_once(__DIR__.'/components/top.php');
?>
<form action="" method="POST">
    <input type="text" value="pacis.sniedze@gmail.com" name="txtLoginEmail" placeholder="Email/Username">
    <input type="text" value="999Ppppp" name="txtLoginPassword" placeholder="Password">
    <button>Log in</button>
</form>
    
</body>
</html>