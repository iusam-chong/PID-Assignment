<?php

require_once('./includes/class-autoload.php');

# check session cart 
function checkCart() {
    if (isset($_SESSION['cart']) && (!empty($_SESSION['cart'])) ) {
            
        $product = new ProductsContr();
        $product->checkSessionCart();

    }
}

$user = new UsersContr();
if ($user->autoLogin()) {

    checkCart();
    header('location: main');
    exit();
}

$lgData = new Form();
if (isset($_POST['textUserName']) || isset($_POST['textPassword'])) {
    
    # Send to form class to make them object
    $lgData->loginForm($_POST['textUserName'], $_POST['textPassword']);
   
    if (!$user->checkUserAuth($lgData)) {
        $lgData->setMessage("你被封鎖了 =(");
        $view = new UsersView();
        $view->loginPage($lgData);
        exit();
    }

    # Should check format =D
    if ($user->userLogin($lgData)) {

        checkCart();
        header('location: main');
        exit();
    } else {
        $lgData->setMessage("帳號或密碼錯誤 =(");
    } 
}

$view = new UsersView();
$view->loginPage($lgData);

?>