<?php
$sPageTitle = 'Home';
$sClassActive= 'home';
require_once(__DIR__.'/functions.php');
require_once(__DIR__.'/components/top.php');



$sBlueprint = '<div id="{{id}}" class="property">
                    <h3 id="address">{{street}}, {{city}}, {{zip}}</h3>                    
                    <img style="width: 200px; height: auto" src="images/{{path}}">
                    <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                    <h3 id="price">DKK {{price}}</h3>
                    <p id="description">{{description}}</p>                    
                </div>'
;
$jData = getDataAsJson('data.json');
$jSellers = $jData->sellers;
$aPropertiesArray = [];
foreach($jSellers as $jSeller) {       
       //print_r($jSeller->properties);
      

    //   $sCopyOfBlueprint = $sBlueprint;
    //   $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}', '{{description}}'],
    //                  [$jProperty->price, $jProperty->image, $skey, $jProperty->street, $jProperty->city, $jProperty->zip, $jProperty->bedrooms, $jProperty->bathrooms, $jProperty->size, $jProperty->description], $sCopyOfBlueprint);

    //                  echo $sCopyOfBlueprint;
   }


?>

<div id="home-selection">
    <a href="seller-login.php">SELL YOUR PROPERTY</a>
    <a href="properties.php">BUY A PROPERTY</a>
    
</div>
    
</body>
</html>

