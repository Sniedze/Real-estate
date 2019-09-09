<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Properties';
$sClassActive = 'properties';
session_start();
$sSellerId = $_SESSION['id'];
$jData = getDataAsJson('data.json');
$jProperties = $jData->sellers->$sSellerId->properties;
require_once(__DIR__.'/components/seller-top.php');




?>
<a class="profile-link" href="seller-profile.php">
<img id="profile-image" src="images/profile-placeholder.png">
</a>

<a href="upload.php">Upload new property</a>
<a href="logout.php">Log out</a>
<div id="properties">
<?php

;

$sBlueprint = '<div id="{{id}}" class="property">
                    <h3 id="address">{{street}}, {{city}}, {{zip}}</h3>                    
                    <img style="width: 200px; height: auto" src="images/{{path}}">
                    <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                    <h3 id="price">DKK {{price}}</h3>
                    <p id="description">{{description}}</p>                    
                </div>'
;
if(!empty($jProperties)){
   
   foreach($jProperties as $skey => $jProperty) {
      $sCopyOfBlueprint = $sBlueprint;
      $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}', '{{description}}'],
      [$jProperty->price, $jProperty->image, $skey, $jProperty->street, $jProperty->city, $jProperty->zip, $jProperty->bedrooms, $jProperty->bathrooms, $jProperty->size, $jProperty->description], $sCopyOfBlueprint);
      echo $sCopyOfBlueprint;
   }
}
else {echo '';}
?>
</div>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="app.js"></script>
</body>
</html>


