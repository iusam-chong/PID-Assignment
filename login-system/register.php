<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();
if ($user->autoLogin()) {

    header('location: main');
    exit();
}

$rgData = new Form();
if (isset($_POST["register"])) {

    # Set input data from user to obj
    $rgData->registerForm($_POST['textUserName'],$_POST['textPassword'],$_POST["textPasswordComfird"],$_POST['textName'],$_POST['textIdCard'],$_POST['textPhoneNumber'],$_POST['textEmail']) ;
    
    # Set default error Message, um i know that was strage 
    $rgData->errorMessage("帳號已經存在 =(");

    # If not match any same userName, be TRUE
    if (!$user->findUser($rgData->userName)) {
    
        # The logic here can be more condition and security
        #
        #

        # Change error message data format wrong
        $rgData->errorMessage("有資料輸入錯誤 =(");
       
        if ($rgData->checkFormat($rgData)) {
            
            print_r($rgData);
            # Insert user data to db
            $user->userRegister($rgData);

            # After that create new login data using data from POST
            loginAfterSignUp($rgData->userName, $rgData->userPasswd);
        }
        # When register above everthing work fine, this cide won't 
    }
}

$view = new UsersView();
$view->registerPage($rgData);
die() ;

function loginAfterSignup($n, $p){

    $user = new UsersContr();

    $lgData = new Form();
    $lgData->loginForm($n, $p);
    $user->userLogin($lgData);
    header('location: main');
    exit();

}

?>