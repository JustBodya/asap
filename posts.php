<?php
include __DIR__ . '/functions/db.php';
include __DIR__ . '/functions/auth.php';

$title = "Посты";
$categoryId = (int)$_GET['id'];

$page = 0;
$offset = 0;
$limit = 5;

if (isset($_GET['page'])) {
    $page += $_GET['page'];
    $offset = $page * 5;
}

$resultPosts = getConnection()->prepare("SELECT p.id, p.title
                                            FROM posts p
                                            WHERE id_category =:id
                                            LIMIT $limit OFFSET $offset;");
$resultPosts->execute(['id' => $categoryId]);
$posts = $resultPosts->fetchAll();

$nameCategory = "SELECT name FROM categories WHERE id =:id";
$resultCategories = getConnection()->prepare($nameCategory);
$resultCategories->execute(['id' => $categoryId]);
$categoryName = $resultCategories->fetch();

$countRecords = "SELECT COUNT(*) as count
                FROM posts p
                WHERE p.id_category =:id;";
$countRecords = getConnection()->prepare($countRecords);
$countRecords->execute(['id' => $categoryId]);
$count = $countRecords->fetch();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <?php include __DIR__ . "/widgets/menu.php"; ?>
</header>
<h2 class="title"><?= $categoryName['name'] ?></h2>
<ul>
    <?php foreach ($posts as $item) : ?>
        <li>
            <a href="./post.php?id=<?= $item['id'] ?>"><?= $item['title'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>
<div>
    <a href="./posts.php?id=<?= $categoryId ?>&page=<?= --$page ?>">prev page</a>
    <a href="./posts.php?id=<?= $categoryId ?>&page=<?= ++$page ?>">next page</a>
</div>
</body>
</html>
