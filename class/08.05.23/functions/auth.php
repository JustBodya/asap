<?php
include_once __DIR__ . "/db.php";

session_start();

if (isset($_POST['login'])) {
    $login = strip_tags($_POST['login']);
    $pass = strip_tags($_POST['pass']);

    if ($_POST['login'] === 'admin' && $_POST['pass'] === '123') {
        //setcookie('login', 'admin', time() + 36000, '/');
        $_SESSION['login'] = 'admin';
        header('Location: /');
        die();
    } else {
        die('не админ');
    }
}

function auth($login, $pass)
{
    $result = getConnection()->prepare("SELECT * FROM users WHERe login = :login");
    $result->execute(['login' => $login]);
    $user = $result->fetch();
    if ($user === false) {
        return false;
    }
    if (password_verify($pass, $user['hash'])) {
        return true;
    }
}

$auth = false;

if (isset($_SESSION['login'])) {
    $auth = true;
    $userName = $_SESSION['login'];
}

if (isset($_GET['logout'])) {
    //setcookie('login', 'admin', time() - 36000, '/');
    unset($_SESSION['login']);
    header('Location: /');
    die();
}
