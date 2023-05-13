<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

use blog\models\{User, Post};
use blog\app\Db;

require dirname(__DIR__) . '/app/Autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$db = 'your db';

$user = new User(new Db($db));
$user2 = new User(new Db($db));


$user->getOne(1);
$user2->getOne(2);

$post = new Post();

$post->printSomeText();
