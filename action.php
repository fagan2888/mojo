<?php
 require 'backend.php';
 $edu = new Artikim;
 $coll = $edu->updateCollegesWithLatLng();
$edu->setId($_REQUEST['id']);
$edu->setLat($_REQUEST['lat']);
$edu->setLng($_REQUEST['lng']);
$status = $edu->updateCollegesWithLatLng();
if($status == true)
{
    echo "Updated";

}
else{
    echo "Faild";
}


?>