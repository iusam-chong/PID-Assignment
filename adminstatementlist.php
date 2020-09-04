<?php

require_once('./includes/class-autoload.php');


$user = new UsersContr();

$view = new UsersView();


if(!$user->adminCheck()) {

    header('location: main');

}

$view->adminStatementListPage();
      

?>