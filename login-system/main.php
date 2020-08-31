<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();
if (!$user->autoLogin()) {

    $view = new UsersView();
    header('location: login');
    die();
}

$view = new UsersView();
$view->mainPage();

?>