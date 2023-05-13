<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

use blog\models\{User, Post};
use blog\app\Db;

require dirname(__DIR__) . '/app/Autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$db = 'your db';

$user = new User(1, 'admin', '123', '1', new Db($db));
$user2 = new User(2, 'user', '', '2', new Db($db));

$user->getOne(1);
var_dump($user);
$user2->getOne(2);
var_dump($user2);

$post = new Post(1, 'Животные', 'фыоафшоыад.шо', 1, 'some-path');

var_dump($post);