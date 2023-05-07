<?php
include __DIR__ . '/functions/db.php';
$title = "Посты";
$categoryId = (int)$_GET['id'];
$result = getConnection()->prepare("SELECT title FROM posts WHERE id_category=:id");
$result->execute(['id' => $categoryId]);
$posts = $result->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
<?php foreach ($posts as $item) : ?>
    <div><?= $item['title'] ?></div>
<?php endforeach; ?>
</body>
</html>
