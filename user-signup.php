
<?php
$sPageTitle = 'Sign up';
$sClassActive = 'signup';

require_once(__DIR__.'/components/top.php');
    ?>
   
    <div class="form-container">
        <form id="frmUserSignup" method="POST">
            <div class="input-field">
                <label for="name">Name</label>
                <input id="name" name="txtName" type="text" maxlength="20" data-type="string" data-min="2" data-max="20" value="Yang Min">
            </div>
            <div class="input-field">
                <label for="lastName">Last Name</label>
                <input id="lastName" name="txtLastName" type="text" maxlength="20" data-type="string" data-min="2" data-max="20" value="Wang">
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <input id="email" type="email" name="txtEmail" value="ymw@gmail.com"  maxlength="100" data-type="email">
            </div>
            <div class="input-field">
                <label for="pasword">Password (At least 8 characters. Must include at least 1 number and 1 uppercase character)</label>
                <input id="password"type="text" name="txtPassword" value="999Ppppp" maxlength="20" data-type="string" data-min="8" data-max="20">
            </div>     
            <button id="btnSignup" onclick="return fvUserSignup(this)" data-start="LOGIN" data-wait="WAIT ...">SIGNUP</button>
            
        </form>
        <?php
        include(__DIR__.'/be-create-user-profile.php');
        ?>   
    </div>
    <script src="scripts/validate-form-input.js"></script>
    <script src="scripts/signup-validation.js"></script> 
</body>
</html>
<?php

