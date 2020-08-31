<?php

require_once('./includes/class-autoload.php');

# if exist user session, then go to main page
$user = new UsersContr();
if ($user->autoLogin()) {

    header('location: main');
    exit();
} 

$lgData = new Form();
if (isset($_POST['textUserName']) || isset($_POST['textPassword'])) {
    
    # Send to form class to make them object
    $lgData->loginForm($_POST['textUserName'], $_POST['textPassword']);
    
    if ($lgData->checkFormat($lgData)) {
        
        if ($user->userLogin($lgData)) {
            header('location: main');
            exit();
        }
    }

    $lgData->errorMessage("帳號或密碼錯誤 =(");
}

$view = new UsersView();
$view->loginPage($lgData);

die();

?>