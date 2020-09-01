<?php

$user = new UsersContr();

if (!$user->autoLogin()) {
    header('location: login');
}

?>