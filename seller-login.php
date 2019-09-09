<?php
$sPageTitle = 'User Login';
$sClassActive = 'login';
include(__DIR__.'/api-seller-login.php');


require_once(__DIR__.'/components/seller-top.php');
?>
<div class="form-container">
    <form action="" method="POST">
        <input type="text" value="u.sniedze@gmail.com" name="txtLoginEmail" placeholder="Email/Username">
        <input type="text" value="555Ppppp" name="txtLoginPassword" placeholder="Password">
        <button>Log in</button>
    </form>
</div>
    
</body>
</html>