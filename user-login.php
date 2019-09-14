<?php
$sPageTitle = 'Login';
$sClassActive = 'seller-login';



require_once(__DIR__.'/components/top.php');
?>
<header>
    <a href="user-signup.php">Don`t have a profile? Sign up here</a>
</header>
<div class="form-container">
    <form action="" method="POST">
        <label for="loginEmail">Email</label>
        <input type="email" id="loginEmail"value="ymw@gmail.com" name="txtLoginEmail" placeholder="Email/Username"  maxlength="100" data-type="email">
        <label for="loginPasword">Password (At least 8 characters. Must include at least 1 number and 1 uppercase character)</label>
        <input type="text" id="loginPassword" value="999Ppppp" name="txtLoginPassword" placeholder="Password" maxlength="20" data-type="string" data-min="8" data-max="20">
        <button>LOGIN

        </button>
    </form>
    <?php
    include(__DIR__.'/be-user-login.php');
    ?>
    
</div>
    
</body>
</html>