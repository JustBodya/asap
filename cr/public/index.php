<?php

use blog\models\{User, Post};


include "../vendor/autoload.php";

//localhost/?c=posts&a=delete&id=1

$controllerName = $_GET['c'] ?? 'index';
$actionName = $_GET['a'] ?? 'index';

$controllerClass = "blog\\controllers\\" . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    die("Нет такого контроллера");
}
