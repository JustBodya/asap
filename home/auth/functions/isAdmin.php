<?php
function isAdmin(): bool
{
    session_start();

    $query = "SELECT name, login FROM roles r JOIN users u ON u.role = r.id WHERE login = 'admin' AND name = 'admin'";
    $result = getConnection()->query($query);
    $rights = $result->fetch();

    if (isset($_SESSION['login']) && $_SESSION['login'] == $rights['login'] && $rights['name'] == 'admin') {
        return true;
    } else {
        return false;
    }
}