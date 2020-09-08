<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();
$view = new UsersView();
$product = new ProductsContr();

# Set default carUnit
$cartUnit = 0;

$loginStatus = $user->autoLogin();

// unset($_SESSION['cart']);

# Delete item from cart
if (isset($_POST['delFromCart'])) {
    $prodId = $_POST['delFromCart'];

    if ($loginStatus) {

        $product->removeCartItem($prodId);

    } else {
        if (isset($_SESSION['cart'])) {

            $key = array_search($prodId,$_SESSION['cart']);
            unset($_SESSION['cart'][$key]);
    
            if (empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
        }
    }
}

# Billing
if (isset($_POST['bill'])) {

    if (!$loginStatus) {
        header('location: login');
    } else {

        $quantity = $_POST['quantity'] ;
        foreach ($_POST['productId'] as $key => $prodId) {
            
            $billData = new Form();
            $billData->setBillList($prodId, $quantity[$key]);
            $billList[] = $billData; 
        }
        $product->billing($billList);
        header('location: statement');
    }
}

# Views taking data from session / db
# If user logged in send user data to views
if ($loginStatus) {

    $userData = $user->getUserData();
    $cartUnit = $product->cartUnit();

    $cartList =$product->getCartItem();

    $view->cartPage($userData,$cartUnit,$cartList);

} else {

    $cartList = NULL ;

    if (isset($_SESSION['cart'])) {
        $cartUnit = countSessionCart();

        $index = 0;
        foreach($_SESSION['cart'] as $arr) {
            $cartList[] = $product->getProduct($arr);
            $cartList[$index++]['quantity'] = 1;
        }
    }

    $view->cartPage(NULL,$cartUnit,$cartList);
}

function countSessionCart() {

    $arr = $_SESSION['cart'];
    return count($arr);
}

?>