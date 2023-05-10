<?php
include 'functions/db.php';

$query = "SELECT name, login FROM roles r JOIN users u ON u.role = r.id WHERE login = 'admin' AND name = 'admin'";
$result = getConnection()->query($query);
$rights = $result->fetch();
var_dump($rights);
