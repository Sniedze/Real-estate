<?php

$sClassActive= 'home';
$sPageTitle = 'Home';
session_start(); 
require_once(__DIR__.'/functions.php');

$sBlueprint = '<div id="{{id}}" class="property">
                                       
                    <img style="width: 250px; height: auto" src="images/{{path}}">
                    <h4 id="details">{{bedrooms}} bds | {{bathrooms}} ba | {{size}} m2 </h4>
                    <h4 id="price">DKK {{price}}</43>
                    <h4 id="address">{{street}}, {{city}}, {{zip}}</h4> 
                    <img class="like-icon" style="width: 30px; height: auto" src="images/like-icon.png">                    
                </div>';
$jData = getDataAsJson('data.json');
$jSellers = $jData->sellers;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet' />
    
    <title>Home</title>
</head>
<body>   
    <nav>        
        <img class="logo" src="images/Group.png" alt="">
        <a <?= $sClassActive == 'home'?'class="active"':'';?> href="index.php">HOME</a>
        <a <?= $sClassActive == 'user-login'?'class="active"':''; ?> href="user-login.php">USER PROFILE</a> 
        <a <?= $sClassActive == 'seller-login'?'class="active"':'';?> href="seller-login.php">SELLER PROFILE</a>
        <a <?= $sClassActive == 'logout'?'class="active"':'';?> href="logout.php">LOG OUT</a> 
            
    </nav>
    <main id="home-main-content">
        <div id="property-container">
            <div id="search-field">
                <form id="frmSearch" action="home.php"method="GET">
                <h3>Search for properties by zip codes:</h3>    
                <input name="search" id="txtSearch" type="text" placeholder="zip">
                    <button id="search">Search</button>                    
                </form>
                <div id="search-result-container">
                    <ul id="search-results"><?php include('be-search.php')?></ul>
                    <button id="clear-search">Clear Search Results</button>
                </div>
                
            </div>
            
            <div id="all-properties">
            <?php
                foreach($jSellers as $jSeller) {   
                    if(isset($jSeller->properties)){
                        $jProperties=$jSeller->properties;
                        foreach($jProperties as $sKey =>$jProperty){    
                            $sCopyOfBlueprint = $sBlueprint;
                            $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}', '{{street}}', '{{city}}', '{{zip}}', '{{bedrooms}}', '{{bathrooms}}', '{{size}}'],
                            [($jProperty->price), $jProperty->image, $sKey, $jProperty->street, $jProperty->city, $jProperty->zip, $jProperty->bedrooms, $jProperty->bathrooms, $jProperty->size], $sCopyOfBlueprint);
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
    <script src="scripts/like-property.js"></script>
    <script src="scripts/reset-search-results.js"></script>
</body>
</html>

