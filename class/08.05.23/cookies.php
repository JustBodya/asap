<?php




setcookie('login', '', time() + 36000, '/');
unset($_COOKIE['login']);
var_dump($_COOKIE);