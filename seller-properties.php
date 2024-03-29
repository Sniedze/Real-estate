<?php
require_once(__DIR__.'/functions.php');
$sPageTitle = 'Seller Properties';
$sClassActive = 'seller-login';
session_start();
require_once(__DIR__.'/components/top.php');

if(!$_SESSION){
      header('Location: seller-login.php');
}

      $sSellerId = $_SESSION['sellerId'];
      $jSeller = $_SESSION['seller'];


?>
<main>
<header>
      <h2>Welcome, <?=$jSeller->name?></h2>
      <a href="seller-profile.php">Go to Profile</a>
</header>
<div id="seller-page">
      <section id="property-upload">
            <h2>Upload Property</h2>
            <div class="form-container form">
                  <form id="form-property-upload" action="" method="POST" enctype="multipart/form-data">
                        <label for="">Upload property image</label>
                        <input type="file" name="myFile" id="file">
                        
                        <div class="input-field">
                              <label for="select">City:</label>   
                              <input type="text" name="txtCity" id="city" >         
                        </div>
                        <div class="input-field">
                              <label for="select">Zip:</label>   
                              <input type="text" name="txtZip" id="zip" >         
                        </div>
                        <div class="input-field">
                              <label for="">Street:</label>
                              <input type="text" name="txtStreet" id="street" >
                        </div>        
                        <div class="input-field">
                              <label for="">Size in m2:</label>
                              <input type="text" name="txtSize" id="size" >
                        </div>
                        <div class="input-field">
                              <label for="">Bedrooms:</label>
                              <input type="text" name="txtBedrooms" id="bedrooms">
                        </div>
                        <div class="input-field">
                              <label for="">Bathrooms:</label>
                              <input type="text" name="txtBathrooms" id="bathrooms">
                        </div>
                        <div class="input-field"> 
                              <label for="">Price:</label>         
                              <input type="text" name="txtPrice" id="price">
                        </div> 
                        
                        <div class="input-field"> 
                              <label for="">Description</label>
                              <textarea type="text" name="txtDescription" id="description"></textarea>
                        </div>
                        <input type="submit" id="upload-button" value="UPLOAD">
                  </form>
            </div>
      </section>
    
   
      <section id="properties">
            <?php
            $sBlueprint = '<div id="{{id}}" class="property">
                                                
                              <img style="width: 250px; height: auto" src="images/{{path}}">
                              <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                              <h3 id="price">DKK {{price}}</h3>  
                              <h3 id="address">{{street}}, {{city}}, {{zip}}</h3>  
                              <button class="delete-button">DELETE PROPERTY</button>                    
                        </div>'
            ;
            $jData = getDataAsJson('data.json');   
            if(!empty($jData->sellers->$sSellerId->properties)){
                  $jProperties = $jData->sellers->$sSellerId->properties;}
            
            if(isset($jProperties)){            
                  foreach($jProperties as $skey => $jProperty) {
                  $sCopyOfBlueprint = $sBlueprint;
                  $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}'],
                  [$jProperty->price, $jProperty->image, $skey, $jProperty->street, $jProperty->city, $jProperty->zip, $jProperty->bedrooms, $jProperty->bathrooms, $jProperty->size], $sCopyOfBlueprint);
                  echo $sCopyOfBlueprint;
                  }
            }
            else {echo '';}
            ?>
      </section>
      </div>   
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="app.js"></script>
<script src="scripts/delete-property.js"></script>
</body>
</html>


