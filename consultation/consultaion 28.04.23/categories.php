<?php
const POST_PER_PAGE = 3;
include __DIR__ . "/functions/db.php";
$title = "Категории";

$page = 0;
$offset = 0;

if (isset($page, $_GET['page'])) {
    
}

$result = getConnection()->query("SELECT * FROM categories LIMIT " . POST_PER_PAGE . " OFFSET $offset");

$countPages = (int)getConnection()->query("SELECT COUNT(id) as count FROM categories")->fetch()['count'] / POST_PER_PAGE;

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
<p>Категории</p>
<br>
<ul class="list-style">
    <?php if (isset($page, $_GET['page'])) : ?>
        <?php foreach ($categories as $i) : ?>
            <li>
                <a href="./posts.php?id=<?= $i['id'] ?>">
                    <?= $i['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $countPages; $i++) : ?>
        <a href="./categories.php?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</ul>

</body>
</html>
