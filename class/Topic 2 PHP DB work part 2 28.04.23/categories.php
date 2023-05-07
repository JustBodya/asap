<?php
include __DIR__ . "/functions/db.php";
$title = "Категории";
$result = getConnection()->query("SELECT * FROM categories");
$categories = $result->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<?php include __DIR__ . "/widgets/menu.php"; ?>
<div>Категории</div>
<br>
<?php foreach ($categories as $i) : ?>
    <a href="./posts.php?id=<?= $i['id'] ?>">
        <div><?= $i['name'] ?></div>
    </a>  <br>
<?php endforeach; ?>
</body>
</html>
