<?php

require_once('./includes/class-autoload.php');
require_once('./autologin.php');

$user = new UsersContr();

$view = new UsersView();


if(!$user->adminCheck()) {

    header('location: login');

}
   
    

if(isset($_POST['userId'])) {

    $user->setUserAuth($_POST['userId']);

}

$view->memberListPage();

?>