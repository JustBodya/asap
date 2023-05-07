<?php
include __DIR__ . '/functions/db.php';
$title = "Посты";
$categoryId = (int)$_GET['id'];

$page = 0;
$offset = 0;
if (isset($_GET['page'])) {
    $page += $_GET['page'];
    $offset = $page * 5;
}

$resultPosts = getConnection()->prepare("SELECT p.id, p.title
                                            FROM posts p
                                            WHERE id_category =:id
                                            LIMIT 5 OFFSET $offset;");
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
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php include __DIR__ . "/widgets/menu.php"; ?>
<h2><?= $categoryName['name'] ?></h2>
<ul>
    <?php foreach ($posts as $item) : ?>
        <li>
            <a href="./post.php?id=<?= $item['id'] ?>"><?= $item['title'] ?></a>
        </li>
    <?php endforeach; ?>
</ul>
<div>
    <?php if ($offset == 0) : ?>
        <a href="./posts.php?id=<?= $categoryId ?>&page=<?= ++$page ?>">next page</a>
    <?php elseif ($offset >= $count) : ?>
        <a href="./posts.php?id=<?= $categoryId ?>&page=<?= --$page ?>">prev page</a>
    <?php else : ?>
        <a href="./posts.php?id=<?= $categoryId ?>&page=<?= --$page ?>">prev page</a>
        <a href="./posts.php?id=<?= $categoryId ?>&page=<?= ++$page ?>">next page</a>
    <?php endif; ?>

</div>
</body>
</html>
