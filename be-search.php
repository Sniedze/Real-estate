<?php
require_once('functions.php');



if( !isset( $_GET['search'] ) ){
  echo '';
 return;
}
$sSearchFor = $_GET['search']; // The user's input 2400

$jData = getDataAsJson('data.json');
$jSellers = $jData->sellers;
$zipMatches = [];
if( !empty( $_GET['search'] )  && $_GET['search'] !== "0"  ){
foreach($jSellers as $jSeller){
    if(isset($jSeller->properties)){
        foreach($jSeller->properties as $jProperty){
            ($jProperty->zip);
            if(strpos($jProperty->zip, $sSearchFor)!== false){
            array_push($zipMatches,'<li>'.$jProperty->street.', '. $jProperty->city.', '. $jProperty->zip.','. $jProperty->bedrooms.' bds | '.$jProperty->bathrooms.' ba | '.$jProperty->size. 'm2, DKK '.$jProperty->price);
            }
            else{
                
            }
        };
        }
    }
    

foreach($zipMatches as $zipMatch){
    echo json_encode($zipMatch);
}
if (empty($zipMatches)){
    echo '<li>There are no properties with the zip code '.$sSearchFor; 
}
}
