<?php

$sClassActive= 'home';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />
    <title>Home</title>
</head>
<body>   
    <nav>        
        <a <?= $sClassActive == 'home'?'class="active"':'';?> href="index.php">HOME</a>
        <a <?= $sClassActive == 'properties'?'class="active"':'';?> href="home.php">BUY</a>
        <a <?= $sClassActive == 'sell'?'class="active"':'';?> href="seller-login.php">SELL</a> 
        <a <?= $sClassActive == 'seller-signup'?'class="active"':''; ?> href="seller-signup.php">SIGN UP</a> 
        <a <?= $sClassActive == 'login'?'class="active"':'';?> href="seller-login.php">LOG IN</a>
            
    </nav>
<?php

require_once(__DIR__.'/functions.php');

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
        <div id="property-container">
            <form id="frmSearch" method="GET">
                <input name="search" id="txtSearch" type="text" placeholder="search">
                <button id="search">Search</button>
                <button id="clear-serach">Clear Search Results</button>
            </form>
            <div id="all-properties">
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
            
        </div>
    

        <div id="map">
        
            <script>
            mapboxgl.accessToken = 'pk.eyJ1Ijoic25pZWR6ZSIsImEiOiJjazBjNWdrYnQweWt1M29waThhcHBldXprIn0.Tj39eOtSJbtfym-qD3ZxjQ';
            var map = new mapboxgl.Map({
            container: 'map',
            center: [12.555050, 55.704001], // starting position
            zoom: 12, // starting zoom
            style: 'mapbox://styles/sniedze/ck0c6j1e641671dmvz83yvy2e'
            
            });
            map.addControl(new mapboxgl.NavigationControl());
            </script>
            
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
</body>
</html>

