<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();
$view = new UsersView();
$product = new ProductsContr();

if ($user->adminCheck()) {
    
    header('location: adminmain');

} 

# Set default carUnit
$cartUnit = 0;

$loginStatus = $user->autoLogin();

if (isset($_POST['clickAddToCart'])) {

    if ($loginStatus == TRUE) {

        $productId = $_POST['clickAddToCart'];
        $product->addToCart($productId);

    } else {

        // unset($_SESSION['cart']) ;
        // die() ;
        // print_r($_SESSION['cart']);

        $productId = $_POST['clickAddToCart'];
       
        # Create session cart if not exist 
        if (!isset($_SESSION['cart'])) {

            $arr = array($productId);
            $_SESSION['cart'] = $arr;
        
        } else {

            # Just let user add a product multiple time
            // array_push($_SESSION['cart'], $productId);

            # Won't let user add a product multiple time
            $arr = $_SESSION['cart'];
            foreach ($arr as $key => $value) {
                if ($value === $productId) {
                    break ;
                }
                if ($key == array_key_last($arr)) {
                    array_push($_SESSION['cart'], $productId);
                }
            } 
        } 
    }
} 

# Get product list
$productData = $product->getAllProduct();

# If user logged in send user data to views
if ($loginStatus) {

    $userData = $user->getUserData();
    $cartUnit = $product->cartUnit();

    $view->userMainPage($productData,$userData,$cartUnit);

} else {

    $cartUnit = countSessionCart();
    $view->userMainPage($productData,NULL,$cartUnit);
}

function countSessionCart() {

    $arr = $_SESSION['cart'];
    $result = count(array_count_values($arr)) ;

    return $result;
}

?>