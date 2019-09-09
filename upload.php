<?php
$sPageTitle = 'Upload Property';
$sClassActive = 'upload';
include(__DIR__.'/api-upload-property.php');
require_once(__DIR__.'/components/seller-top.php');

?>

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
        <button>UPLOAD</button>
    </form>
</div>
    
</body>
</html>