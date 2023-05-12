<?php
session_start();
include_once __DIR__ . "/db.php";

if (isset($_POST['login'])) {
    $login = strip_tags($_POST['login']);
    $password = strip_tags($_POST['password']);

    if (auth($login, $password)) {
        $_SESSION['auth']['login'] = $login;

        if ($login === 'admin') $_SESSION['auth']['role'] = '1';

        header('Location: /');
        die();
    } else {
        die('incorrect login or password');
    }
}

function isAdmin(): bool
{
    return isset($_SESSION['auth']['role']) == '1';
}

function auth($login, $password)
{
    $salt = 'ijghyihsnkuhabxuyfgqw';
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, [$salt]);

    $result = getConnection()->prepare("SELECT * FROM users WHERE login = :login;");
    $result->execute(['login' => $login]);
    $user = $result->fetch();

    if ($user === false) return false;
    if (password_verify($user['password'], $passwordHash)) return true;
}

$auth = false;

if (isset($_SESSION['auth']['login'])) {
    $auth = true;
    $userName = $_SESSION['auth']['login'];
}

if (isset($_GET['logout'])) {
    unset($_SESSION['auth']['login']);
    unset($_SESSION['auth']['role']);
    header('Location: /');
    die();
}