
<?php
$sPageTitle = 'Sign up';
$sClassActive = 'signup';
include(__DIR__.'/be-create-seller-profile.php');

require_once(__DIR__.'/components/seller-top.php');
    ?>
    <div class="form-container">
        <form id="frmSignup" method="POST">
            <div class="input-field">
                <label for="name">Name</label>
                <input name="txtName" type="text" maxlength="20" data-type="string" data-min="2" data-max="20" value="Ulrika">
            </div>
            <div class="input-field">
                <label for="">Last Name</label>
                <input name="txtLastName" type="text" maxlength="20" data-type="string" data-min="2" data-max="20" value="Bajele">
            </div>
            <div class="input-field">
                <label for="">Email</label>
                <input type="email" name="txtEmail" value="u.sniedze@gmail.com" id="email" maxlength="100" data-type="email">
            </div>
            <div class="input-field">
                <label for="">Password (At least 8 characters. Must include at least 1 number and 1 uppercase character)</label>
                <input type="text" name="txtPassword" value="555Ppppp" id="password" maxlength="20" data-type="string" data-min="8" data-max="20">
            </div>     
            <button id="btnSignup" onclick="return fvSignup(this)" data-start="LOGIN" data-wait="WAIT ...">SIGNUP</button>
            
        </form>
    </div>
    <script src="scripts/validate-form-input.js"></script>
    <script src="scripts/signup-validation.js"></script> 
</body>
</html>