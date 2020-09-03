<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();
$view = new UsersView();
$product = new ProductsContr();

# Set default carUnit
$cartUnit = 0;

$loginStatus = $user->autoLogin();

# Get product list
//$productData = $product->getAllProduct();

# If user logged in send user data to views
if ($loginStatus) {

    $userData = $user->getUserData();
    $cartUnit = $product->cartUnit();

    $cartList =$product->getCartItem();

    $view->cartPage($userData,$cartUnit,$cartList);

} else {

    if (isset($_SESSION['cart'])) {
        $cartUnit = countSessionCart();
    }

    $view->cartPage(NULL,$cartUnit,NULL);
}

function countSessionCart() {

    $arr = $_SESSION['cart'];
    return count($arr);
}

?>