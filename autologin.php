<?php

$user = new UsersContr();

$user->autoLogin();

// if (!$user->autoLogin()) {
//     header('location: login');
// }

?>