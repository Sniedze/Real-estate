<?php
$sPageTitle = 'Sign up';
$sClassActive = 'signup';
require_once(__DIR__.'/components/top.php');

?>
    <div class="form-container">
        <form action="" method="POST">
            <div class="input-field">
                <label for="">Name</label>
                <input type="text" name="txtName" value="Ulrika" id="name">
            </div>
            <div class="input-field">
                <label for="">Last Name</label>
                <input type="text" name="txtLastName" value="Sniedze" id="lastName">
            </div>
            <div class="input-field">
                <label for="">Email</label>
                <input type="text" name="txtEmail" value="u.sniedze@gmail.com" id="email">
            </div>
            <div class="input-field">
                <label for="">Password</label>
                <input type="text" name="txtPassword" value="555" id="password">
            </div>
           
            <div class="input-field">
                <button>Sign up</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php


