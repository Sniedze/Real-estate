<?php
require_once(__DIR__.'/functions.php');

session_start();
$sUserId = $_SESSION['id'];
$jUsers = getDataAsJson(__DIR__.'/data.json');
$jProperties = $jUsers->users->$sUserId->properties;
print_r($jProperties);

$sBlueprint = '<article class="properties">
                <section class="property">
                    <div class="description"
                        <h2 id="price">Price: ${{price}}</h2>
                    </div>
                    <img style="width: 200px; height: auto" src="images/{{path}}">
                </section> 
</article>';

foreach($jProperties as $skey => $jProperty) {
   $sCopyOfBlueprint = $sBlueprint;
   $sCopyOfBlueprint = str_replace(['{{price}}', '{{path}}', '{{id}}'],
                    [$jProperty->price, $jProperty->image, $skey], $sCopyOfBlueprint);

                    echo $sCopyOfBlueprint;
}



?>