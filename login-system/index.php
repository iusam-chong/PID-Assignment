<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();

// $rgData = new Form();
// $rgData->registerForm('myUserName21','myPassword','myName','myIdCard','myEmail','myPhoneNum') ;

// $lgData = new Form();
// $lgData->loginForm('myUserName21','myPassword');

// $user->userRegister($rgData);

// $user->userLogin($lgData);

// $user->userLogout();

if ($user->autoLogin()) {

    $view = new UsersView();
    //echo "auto login" ;
    header('location: main');

} else {
    $view = new UsersView();
    header('location: login');
    //$view->loginPage();
}

?>