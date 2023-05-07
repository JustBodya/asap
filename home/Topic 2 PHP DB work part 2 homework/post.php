<?php
include __DIR__ . '/functions/db.php';
$title = "Пост";

$postId = $_GET['id'];

$result = getConnection()->prepare("SELECT p.title, p.content, c.name 
                                            FROM public.posts p
                                                JOIN categories c on p.id_category = c.id 
                                            WHERE p.id =:id");
$result->execute(['id' => $postId]);
$post = $result->fetchAll();

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
<?php foreach ($post as $item) : ?>
    <h2>Название категории: <?= $item['name'] ?></h2> <br>
    <p>Заголовок поста: <?= $item['title'] ?></p> <br>
    <p>Контент: <?= $item['content'] ?></p>
<?php endforeach; ?>

</body>
</html>
