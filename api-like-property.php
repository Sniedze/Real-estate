<?php
require_once(__DIR__.'/functions.php');
session_start();
if(!$_SESSION) return;
$jData = getDataAsJson(__DIR__.'/data.json');
$sUserId = $_SESSION['userId'];
$sClickedPropertyId = $_POST['likeIndex'];
$jSellers = $jData->sellers;

foreach($jSellers as $jSeller){        
        foreach($jSeller->properties as $sPropertyId=> $jProperty){
            if($sPropertyId == $sClickedPropertyId){    
                $jClickedProperty=$jProperty;             
            }
        }
    }
   
    
    $jLikedProperty = new stdClass();
    $sLikedPropertyUniqueId = uniqid();
    $jLikedProperty->price = $jClickedProperty->price;
    $jLikedProperty->image = $jClickedProperty->image;
    $jLikedProperty->city = $jClickedProperty->city;
    $jLikedProperty->zip = $jClickedProperty->zip;
    $jLikedProperty->street = $jClickedProperty->street;
    $jLikedProperty->size = $jClickedProperty->size;
    $jLikedProperty->bedrooms =$jClickedProperty->bedrooms;
    $jLikedProperty->bathrooms = $jClickedProperty->bathrooms;
    $jLikedProperty->description = $jClickedProperty->description;

    
    $jData->users->$sUserId->likedProperties->$sLikedPropertyUniqueId = $jLikedProperty;
    saveDataToFile($jData, 'data.json');

    