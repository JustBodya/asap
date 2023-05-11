<?php
include 'functions/db.php';
$password = 123;
$salt = 'ijghyihsnkuhabxuyfgqw'; // соль для пароля 123
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
var_dump($passwordHash);
