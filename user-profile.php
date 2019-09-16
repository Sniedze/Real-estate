<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'User Profile';
$sClassActive = 'user-login';
require_once(__DIR__.'/components/top.php');
session_start();
if(!isset($_SESSION)){
    header('Location: user-login.php'); 
    return;   
}

    $sUserId = $_SESSION['userId'];
    $jData = getDataAsJson('data.json');
    $jUser = $jData->users->$sUserId;
    
    
   
    $sBlueprint = '<div id="{{id}}" class="property">                                 
                    <img style="width: 200px; height: auto" src="images/{{path}}">
                    <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                    <h3 id="price">DKK {{price}}</h3>
                    <h3 id="address">{{street}}, {{city}}, {{zip}}</h3>      
                    <img class="like-icon" style="width: 30px; height: auto" src="images/red-like-icon.png"> 
                    <button class="btn-delete-property">REMOVE</button>                   
                </div>';


    ?>
    <main>
   <header>
        <h2 class="welcome-message">Welcome, <?=$jUser->name?></h2>
   </header>    
    <div id="user-page">
        <section id="user-profile">
            
            <div class="form-container" id="user-form-container"> 
            <h2>Edit your profile here</h2>  
                <form class="form" id="<?=$sUserId?>" class="profile-details" method="POST"> 
                <div class="input-field"> 
                    <label for="">Name</label>       
                    <input class="input" type="text" data-update="name" name="txtNewName" placeholder="Name" value="<?=$jUser->name?>">
                </div>
                <div class="input-field">
                    <label for="">Last Name</label>   
                    <input class="input" type="text" data-update="lastName" name="txtNewLastName" placeholder="Last Name" value="<?=$jUser->lastName?>">
                </div>
                <div class="input-field">
                    <label for="">Email</label> 
                    <input class="input" type="text" data-update="email" name="txtNewEmail" placeholder="Email" value="<?=$jUser->email?>">
                </div>
                <div class="input-field">
                    <label for="">Password</label>
                    <input class="input" type="text" data-update="password" name="txtNewPassword" placeholder="New Password" value="<?=$jUser->password?>">
                </div> 
                    <button class="delete" id="delete-profile-button"; return false; >DELETE PROFILE</button>
                </form>
            </div>
        </section>
        <section id="user-saved-properties">
            <h2>Properties you have saved</h2>
            <article class="property-container" id="saved-properties">
            <?php
            
            $jUser = $jData->users->$sUserId;
                
                    if(isset($jUser->likedProperties)){
                        $jLikedProperties=$jUser->likedProperties;
                        foreach($jLikedProperties as $sKey =>$jLikedProperty){    
                            $sCopyOfBlueprint = $sBlueprint;
                            $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}'],
                            [$jLikedProperty->price, $jLikedProperty->image, $sKey, $jLikedProperty->street, $jLikedProperty->city, $jLikedProperty->zip, $jLikedProperty->bedrooms, $jLikedProperty->bathrooms, $jLikedProperty->size], $sCopyOfBlueprint);
                            echo $sCopyOfBlueprint;
            }}

            ?>
            </article>
        </section>
        </div>
    </main>
    <?php


?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <script src="scripts/delete-user-profile.js"></script>
    <script src="scripts/delete-saved-property.js"></script> 
    <script src="scripts/update-user-profile.js"></script> 
    
    </body>
    </html>

