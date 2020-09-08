<?php

require_once('./includes/class-autoload.php');


$user = new UsersContr();

$view = new UsersView();

$product = new ProductsContr();

if(!$user->adminCheck()) {

    header('location: main');

}

#make default data
$data = $product->soldToday();

$btnFlag = (object)[] ;
$btnFlag->day = 1;

if (isset($_POST['day'])){
    $data = $product->soldToday();
    $btnFlag->day = 1;
}

if (isset($_POST['week'])){
    $data = $product->soldLastSevenDay();
    unset($btnFlag->day);
    $btnFlag->week = 1;
}

$view->adminChartPage($data,$btnFlag);
      
?>