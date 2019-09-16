
<?php
$sPageTitle = 'Sign up';
$sClassActive = 'user-login';

require_once(__DIR__.'/components/top.php');
    ?>
   <main>
     <header>
            <a href="seller-login.php">Already a member? Log in here</a>
    </header>
    <div class="form-container">
        <h2>SIGN UP HERE</h2>
        <form class="form"id="frmUserSignup" method="POST">
            <div class="input-field">
                <label for="name">Name (2-20 characters)</label>
                <input id="name" name="txtName" type="text" maxlength="20" data-type="string" data-min="2" data-max="20" >
            </div>
            <div class="input-field">
                <label for="lastName">Last Name (2-20 characters)</label>
                <input id="lastName" name="txtLastName" type="text" maxlength="20" data-type="string" data-min="2" data-max="20" >
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <input id="email" type="email" name="txtEmail" maxlength="100" data-type="email">
            </div>
            <div class="input-field">
                <label for="pasword">Password (At least 8 characters. Must include at least 1 number and 1 uppercase character)</label>
                <input id="password" type="text" name="txtPassword" maxlength="20" data-type="string" data-min="8" data-max="20">
            </div>     
            <button id="btnSignup" onclick="return fvUserSignup(this)" data-start="LOGIN" data-wait="WAIT ...">SIGNUP</button>
            
        </form>
        <?php
        include(__DIR__.'/be-create-user-profile.php');
        ?>   
    </div>
    </main>
    <script src="scripts/validate-form-input.js"></script>
    <script src="scripts/signup-validation.js"></script> 
</body>
</html>
<?php

