<?php

require_once('./includes/class-autoload.php');

$user = new UsersContr();
$user->userLogout();
header('location: login');


?>