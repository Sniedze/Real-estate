<?php
$sPageTitle = 'Upload Property';
$sClassActive = 'upload';
include(__DIR__.'/api-upload-property.php');
require_once(__DIR__.'/components/top.php');

?>

<h2>Upload Property</h2>
<div class="form-container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-field" id="radio-input">
            <Label>Property Type:</Label>
            <input type="radio" name="property-type" value="house" checked>House<br>
            <input type="radio" name="property-type" value="condo" checked>Condo<br>
            <input type="radio" name="property-type" value="apartament" checked>Apartament<br>
            <input type="radio" name="property-type" value="townhome" checked>Townhome<br>
            <input type="radio" name="property-type" value="industrial" checked>Industrial<br>
            <input type="radio" name="property-type" value="land" checked>Land<br>
        </div>
        <div class="input-field">
            <label for="select">State:</label>
            <select >
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>	
        </div>
        <div class="input-field">
            <label for="">Address:</label>
            <input type="text" name="txtAddress">
        </div>
        <div class="input-field">
            <label for="">Sqft:</label>
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
        <button>UPLOAD</button>
    </form>
</div>
    
</body>
</html>