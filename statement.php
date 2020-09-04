<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();

if (!$user->autoLogin()) {
    header('location: main');
}

$view = new UsersView();
$product = new ProductsContr();

# Set default carUnit
$cartUnit = 0;

$statement = $user->getStatement();
$userData = $user->getUserData();
$cartUnit = $product->cartUnit();
$cartList =$product->getCartItem();

$view->statementPage($userData,$cartUnit,$cartList,$statement);

?>