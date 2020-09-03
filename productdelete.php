<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();

$view = new UsersView();

if(!$user->adminCheck()) {

    header('location: main');

}

// if(isset($_POST['userId'])) {

//     $user->setUserAuth($_POST['userId']);

// }

$view->productDeletePage();

?>