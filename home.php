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
                </div>';
$jData = getDataAsJson('data.json');
$jSellers = $jData->sellers;
?>
<main id="home-main-content">
<div id="all=properties">
<?php
foreach($jSellers as $jSeller) {   
      if(isset($jSeller->properties)){
          $jProperties=$jSeller->properties;
          foreach($jProperties as $sKey =>$jProperty){    
      

      $sCopyOfBlueprint = $sBlueprint;
      $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}', '{{description}}'],
                     [($jProperty->price), $jProperty->image, $sKey, $jProperty->street, $jProperty->city, $jProperty->zip, $jProperty->bedrooms, $jProperty->bathrooms, $jProperty->size, $jProperty->description], $sCopyOfBlueprint);

                     echo $sCopyOfBlueprint;
   }}}


?>
</div>
<div id="map">
    
</div>
</main>
</body>
</html>

