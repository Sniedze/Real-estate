<?php


require_once(__DIR__.'/functions.php');
session_start();

if($_POST){

    $file = $_FILES['myFile']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $sUniqueImageName= uniqid().'.'.$ext;
    move_uploaded_file($_FILES['myFile']['tmp_name'], __DIR__."/images/$sUniqueImageName");
    $sPrice = $_POST['txtPrice'];
    $sCity = $_POST['txtCity'];
    $sZip = $_POST['txtZip'];
    $sStreet = $_POST['txtStreet'];
    $sSize = $_POST['txtSize'];
    $sBedrooms = $_POST['txtBedrooms'];
    $sBathrooms = $_POST['txtBathrooms'];
    $sDescription = $_POST['txtDescription'];

    //Validate property price
    empty($sPrice)?sendErrorMessage('Please, input the property price', __LINE__):
    !ctype_digit($sPrice)?sendErrorMessage('invalid price', __LINE__):
    $sPrice<1?sendErrorMessage('Price must be valid', __LINE__):
    //Validate the City
    empty($sCity)?sendErrorMessage('Please, input the city', __LINE__):
    strlen($sCity)<3||strlen($sCity)>30?sendErrorMessage('Please input the valid city', __LINE__):
    //Validate Zip
    empty($sZip)?sendErrorMessage('Please, input the property zip', __LINE__):
    !ctype_digit($sZip)?sendErrorMessage('Zip should only contain digits', __LINE__):
    !$sZip==4?sendErrorMessage('Zip should contain only 4 digits', __LINE__):
    //Validate address
    empty($sStreet)?sendErrorMessage('Please input the property address', __LINE__):
    strlen($sStreet)<3||strlen($sStreet)>30?sendErrorMessage('Please input the valid address', __LINE__):
    //Validate the Size of the property
    empty($sSize)?sendErrorMessage('Please input the size of the property in Sqft', __LINE__):
    !ctype_digit($sSize)?sendErrorMessage('Size should only contain digits', __LINE__):
    $sSize<5?sendErrorMessage('Property size should be more than 5sqft', __LINE__):
     //Validate the number of Bedrooms of the property
    !ctype_digit($sBedrooms)?sendErrorMessage('Bedroom number should only contain digits', __LINE__):
     //Validate the number of Bathrooms of the property
    !ctype_digit($sBathrooms)?sendErrorMessage('Bathroom number should only contain digits', __LINE__):
    
    $jProperty = new stdClass();
    $jProperty->price = intval($sPrice);
    $jProperty->image = $sUniqueImageName;
    $jProperty->city = $sCity;
    $jProperty->zip = $sZip;
    $jProperty->street = $sStreet;
    $jProperty->size = $sSize;
    $jProperty->bedrooms = $sBedrooms;
    $jProperty->bathrooms = $sBathrooms;
    $jProperty->description = $sDescription;


    $jData = getDataAsJson(__DIR__.'/data.json');
    $sSellerId = $_SESSION['sellerId'];
    $sPropertyUniqueId = uniqid();
    $jData->sellers->$sSellerId->properties->$sPropertyUniqueId = $jProperty;
    saveDataToFile($jData, __DIR__.'/data.json');
    $jData = getDataAsJson(__DIR__.'/data.json');
    $jProperty = $jData->sellers->$sSellerId->properties->$sPropertyUniqueId;
    $sDivNewProperty = ' <div id="'.$sPropertyUniqueId.'" class="property">
                            <h3 id="address">'.$jProperty->street.', '.$jProperty->city.', '.$jProperty->zip.'}</h3>                    
                            <img style="width: 250px; height: auto" src="images/'.$jProperty->image.'">
                            <h4 id="details">'.$jProperty->bedrooms.' bds | '.$jProperty->bathrooms.' ba | ${jData.size} m2 </h4>
                            <h3 id="price">DKK '.$jProperty->price.'</h3>
                            <p id="description">'.$jProperty->description.'</p>                                             
                        </div>';
    echo '{"newDiv": "'.$sDivNewProperty.'"}';

    }
?>