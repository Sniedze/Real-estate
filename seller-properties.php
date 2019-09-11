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
<main id="seller-properties">
   <div id="property-upload">
   <h2>Upload Property</h2>
   <div class="form-container">
      <form action="" method="POST" enctype="multipart/form-data">
         <div class="input-field">
               <label for="select">City:</label>   
               <input type="text" name="txtCity">         
         </div>
         <div class="input-field">
               <label for="select">Zip:</label>   
               <input type="text" name="txtZip">         
         </div>
         <div class="input-field">
               <label for="">Street:</label>
               <input type="text" name="txtStreet">
         </div>        
         <div class="input-field">
               <label for="">Size in m2:</label>
               <input type="text" name="txtSize">
         </div>
         <div class="input-field">
               <label for="">Bedrooms:</label>
               <input type="text" name="txtBedrooms">
         </div>
         <div class="input-field">
               <label for="">Bathrooms:</label>
               <input type="text" name="txtBathrooms">
         </div>
         <div class="input-field"> 
               <label for="">Price:</label>         
               <input type="text" name="txtPrice">
         </div> 
         <div class="input-field"> 
               <label for="">Upload Images</label>
               <input type="file" name="myFile">
         </div>
         <div class="input-field"> 
               <label for="">Description</label>
               <textarea type="text" name="txtDescription"></textarea>
         </div>
         <button id="upload-button">UPLOAD</button>
      </form>
   </div>
    

   </div>
   <div id="properties">
   <?php

     $sBlueprint = '<div id="{{id}}" class="property">
                     <h3 id="address">{{street}}, {{city}}, {{zip}}</h3>                    
                     <img style="width: 200px; height: auto" src="images/{{path}}">
                     <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                     <h3 id="price">DKK {{price}}</h3>
                     <p id="description">{{description}}</p>                    
                  </div>'
   ;
   if(isset($jProperties)){
      
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
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="app.js"></script>
</body>
</html>


