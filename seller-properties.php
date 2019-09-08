<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Properties';
$sClassActive = 'seller-login';


include('api-seller-login-session.php');
require_once(__DIR__.'/components/top.php');




?>
<a class="profile-link" href="seller-profile.php">
<img id="profile-image" src="images/profile-placeholder.png">
<h4>Welcome, <?= $login_session->name?></h4>
</a>

<a href="upload.php">Upload new property</a>
<a href="logout.php">Log out</a>
    
</body>
</html>
<?php


$jProperties = $login_session->properties;
$sBlueprint = '<div id="{{id}}" class="property">
                    <h3 id="property-type">{{propertyType}}<h3/>
                    <h3 id="address">{{street}}, {{city}}, {{zip}}</h3>                    
                    <img style="width: 200px; height: auto" src="images/{{path}}">
                    <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                    <h3 id="price">DKK {{price}}</h3>
                    <p id="description">{{description}}</p>                    
                </div>'
;
foreach($jProperties as $skey => $jProperty) {
   $sCopyOfBlueprint = $sBlueprint;
   $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{propertyType}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}', '{{description}}'],
                    [$jProperty->price, $jProperty->image, $skey, $jProperty->type, $jProperty->street, $jProperty->city, $jProperty->zip, $jProperty->bedrooms, $jProperty->bathrooms, $jProperty->size, $jProperty->description], $sCopyOfBlueprint);

                    echo $sCopyOfBlueprint;
}

?>