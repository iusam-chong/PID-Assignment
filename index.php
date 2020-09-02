<?php

require_once('./includes/class-autoload.php');

# if exist user session, then go to main page

$user = new UsersContr();
header('location: main');

// if (!$user->autoLogin()) {
//     header('location: login');
// } else {
//     header('location: main');
// }

# test function
// $rgData = new Form();
// $rgData->registerForm('myUserName21','myPassword','myName','myIdCard','myEmail','myPhoneNum') ;
// $lgData = new Form();
// $lgData->loginForm('myUserName21','myPassword');
// $user->userRegister($rgData);
// $user->userLogin($lgData);
// $user->userLogout();

?>