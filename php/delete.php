<?php
require 'backend.php';
$delItem = new Artikim;
file_put_contents('test.txt',$_REQUEST['name']);
$delItem->setName($_REQUEST['name']);
$delItem->setAddress($_REQUEST['address']);
$result = $delItem->delShop();
if($result){
    echo 'הכתובת נמחקה';
}else{
    echo 'משהו השתבש';
}




?>