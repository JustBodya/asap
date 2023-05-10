<?php
session_start();
include_once __DIR__ . "/db.php";

if (isset($_POST['login'])) {
    $login = strip_tags($_POST['login']);
    $password = strip_tags($_POST['password']);

    if (auth($login, $password)) {
        $_SESSION['login'] = 'admin';
        header('Location: /');
        die();
    } else {
        die('incorrect login or password');
    }
}

function auth($login, $password)
{
    $salt = 'qweasd;l,asm'; // соль для пароля 123
    $result = getConnection()->prepare("SELECT * FROM users WHERE login = :login");
    $result->execute(['login' => $login]);
    $user = $result->fetch();
    if ($user === false) return false;
    if (password_verify($password, $user['password'])) return true;
}

$auth = false;

if (isset($_SESSION['login'])) {
    $auth = true;
    $userName = $_SESSION['login'];
}

if (isset($_GET['logout'])) {
    unset($_SESSION['login']);
    header('Location: /');
    die();
}