<?php
$sPageTitle = 'Seller Sign up';
$sClassActive = 'signup';
require_once(__DIR__.'/components/seller-top.php');

?>
    <div class="form-container">
        <form action="api-create-seller-profile.php" method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <label for="">Name</label>
                <input type="text" name="txtName" value="Ulrika" id="name" required>
            </div>
            <div class="input-field">
                <label for="">Last Name</label>
                <input type="text" name="txtLastName" value="Sniedze" id="lastName" required>
            </div>
            <div class="input-field">
                <label for="">Email</label>
                <input type="text" name="txtEmail" value="u.sniedze@gmail.com" id="email" required>
            </div>
            <div class="input-field">
                <label for="">Password</label>
                <input type="text" name="txtPassword" value="555" id="password" required>
            </div>
          
            <div class="input-field">
                <button>Sign up</button>
            </div>
        </form>
    </div>
</body>
</html>