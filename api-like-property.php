<?php
require_once(__DIR__.'/functions.php');
session_start();
if(!$_SESSION)return;
$jData = getDataAsJson(__DIR__.'/data.json');
$sUserId = $_SESSION['id'];
//echo $sUserId;
$sClickedPropertyId = $_POST['likeIndex'];
//echo $sPropertyId;
$jSellers = $jData->sellers;

foreach($jSellers as $sSellerId =>$jSeller){
   
    
        
        foreach($jSeller->properties as $sPropertyId=> $jProperty){
            if($sPropertyId==$sClickedPropertyId){
                
                echo $sPropertyId;
            }
        }
    }

    $jClickedProperty = $jData->sellers->$sSellerId->properties->$sPropertyId;
    print_r($jClickedProperty);
    
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
    print_r($jData->users->$sUserId);

    saveDataToFile($jData, 'data.json');
    

    
// 
// $sLikedPropertyUniqueId = uniqid();
//$jData->users->userID->$jLikedProperties->$sLikedPropertyUniqueId=$jLikedProperty;

//saveDataToFile($jData, 'data.json');
// $sDivLikedProperty = ' <div id="'.$sLikedPropertyUniqueId.'" class="property">
//                             <h3 id="address">'.$jLikedProperty->street.', '.$jLikedProperty->city.', '.$jLikedProperty->zip.'}</h3>                    
//                             <img style="width: 200px; height: auto" src="images/'.$jLikedProperty->image.'">
//                             <h4 id="details">'.$jLikedProperty->bedrooms.' bds | '.$jLikedProperty->bathrooms.' ba | ${jData.size} m2 </h4>
//                             <h3 id="price">DKK '.$jLikedProperty->price.'</h3>
//                             <p id="description">'.$jLikedProperty->description.'</p>                                             
//                        </div>';
//     echo '{"newDiv": "'.$sDivLikedProperty.'"}';
//echo "success";





    // saveDataToFile($jData, __DIR__.'/data.json');
    // $jData = getDataAsJson(__DIR__.'/data.json');
    // $jProperty = $jData->sellers->$sSellerId->properties->$sPropertyUniqueId;
    // $sDivNewProperty = ' <div id="'.$sPropertyUniqueId.'" class="property">
    //                         <h3 id="address">'.$jProperty->street.', '.$jProperty->city.', '.$jProperty->zip.'}</h3>                    
    //                         <img style="width: 200px; height: auto" src="images/'.$jProperty->image.'">
    //                         <h4 id="details">'.$jProperty->bedrooms.' bds | '.$jProperty->bathrooms.' ba | ${jData.size} m2 </h4>
    //                         <h3 id="price">DKK '.$jProperty->price.'</h3>
    //                         <p id="description">'.$jProperty->description.'</p>                                             
    //                     </div>';
    // echo '{"newDiv": "'.$sDivNewProperty.'"}';

    
