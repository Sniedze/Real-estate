<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'User Profile';
$sClassActive = 'user-login';
require_once(__DIR__.'/components/top.php');
session_start();
if(!isset($_SESSION['id'])){
    header('Location: seller-login.php');    
}
if(isset($_SESSION['id'])){
    $sUserId = $_SESSION['id'];
    $jUser = $_SESSION['user'];
    $sBlueprint = '<div id="{{id}}" class="property">
                    <h3 id="address">{{street}}, {{city}}, {{zip}}</h3>                    
                    <img style="width: 200px; height: auto" src="images/{{path}}">
                    <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                    <h3 id="price">DKK {{price}}</h3>
                    <p id="description">{{description}}</p>
                    <img class="like-icon" style="width: 30px; height: auto" src="images/like-icon.png">                    
                </div>';
$jData = getDataAsJson('data.json');
$jUsers = $jData->users;

    ?>
   <header>
        <h2>Welcome, <?=$jUser->name?></h2>
   </header>    
    <main id="user-page">
        <section id="user-profile">
            <h3>Edit your profile here</h3>
            <div id="form-container">   
                <form id="<?=$sUserId?>" class="profile-details" method="POST">         
                    <input type="text" data-update="name" name="txtNewName" placeholder="Name" value="<?=$jUser->name?>">
                    <input type="text" data-update="lastName" name="txtNewLastName" placeholder="Last Name" value="<?=$jUser->lastName?>">
                    <input type="text" data-update="email" name="txtNewEmail" placeholder="Email" value="<?=$jUser->email?>">
                    <input type="text" data-update="password" name="txtNewPassword" placeholder="New Password" value="<?=$jUser->password?>">
                    <button class="delete" id="delete-profile-button"; return false; >DELETE PROFILE</button>
                </form>
            </div>
        </section>
        <section id="user-saved-properties">
            <h3>Properties you have saved</h3>
            <article class="property-container">
            <?php
                foreach($jUsers as $jUser) {   
                    if(isset($jUser->likedProperties)){
                        $jLikedProperties=$jUser->likedProperties;
                        foreach($jLikedProperties as $sKey =>$jLikedProperty){    
                            $sCopyOfBlueprint = $sBlueprint;
                            $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}', '{{description}}'],
                            [($jLikedProperty->price), $jLikedProperty->image, $sKey, $jLikedProperty->street, $jLikedProperty->city, $jLikedProperty->zip, $jLikedProperty->bedrooms, $jLikedProperty->bathrooms, $jLikedProperty->size, $jLikedProperty->description], $sCopyOfBlueprint);
                            echo $sCopyOfBlueprint;
            }}}    

            ?>
            </article>
        </section>
    </main>
    
    <?php
}

?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <!-- <script src="scripts/like-property.js"></script> -->
    </body>
    </html>

