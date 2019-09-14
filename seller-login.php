<?php
$sPageTitle = 'User Login';
$sClassActive = 'login';
include(__DIR__.'/be-seller-login.php');


require_once(__DIR__.'/components/top.php');
?>
<div class="form-container">
    <form action="seller.profile.php" method="POST">
        <label for="loginEmail">Email</label>
        <input type="email" id="loginEmail"value="ue@gmail.com" name="txtLoginEmail" placeholder="Email/Username"  maxlength="100" data-type="email">
        <label for="loginPasword">Password (At least 8 characters. Must include at least 1 number and 1 uppercase character)</label>
        <input type="text" id="loginPassword" value="666Ppppp" name="txtLoginPassword" placeholder="Password" maxlength="20" data-type="string" data-min="8" data-max="20">
        <button>LOGIN
            
        </button>
    </form>
    <a href="seller-signup.php">Don`t have a profile? Sign up here</a>
</div>
    
</body>
</html>