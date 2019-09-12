<?php
$sPageTitle = 'User Login';
$sClassActive = 'login';
include(__DIR__.'/be-seller-login.php');


require_once(__DIR__.'/components/top.php');
?>
<div class="form-container">
    <form action="" method="POST">
        <input type="text" value="ue@gmail.com" name="txtLoginEmail" placeholder="Email/Username">
        <input type="text" value="666Ppppp" name="txtLoginPassword" placeholder="Password">
        <button>Log in</button>
    </form>
    <a href="seller-signup.php">Don`t have a profile? Sign up here</a>
</div>
    
</body>
</html>