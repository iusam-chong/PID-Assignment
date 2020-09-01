<?php

require_once('./includes/class-autoload.php');
require_once('./autologin.php');

$user = new UsersContr();

$view = new UsersView();

if ($user->adminCheck()) {
    $view->adminMainPage();
} else {
    $view->userMainPage();
}

?>