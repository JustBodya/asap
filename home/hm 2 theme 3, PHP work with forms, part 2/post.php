<?php
include __DIR__ . '/functions/db.php';

$title = "Пост";

$postId = $_GET['id'];

$result = getConnection()->prepare("SELECT p.title, p.content, p.image, c.name 
                                            FROM public.posts p
                                                JOIN categories c on p.id_category = c.id 
                                            WHERE p.id =:id");
$result->execute(['id' => $postId]);
$post = $result->fetch();

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
<h1 class="title">Название категории: <?= $post['name'] ?></h1> <br>
<p>Заголовок поста: <?= $post['title'] ?></p> <br>
<p>Контент: <?= $post['content'] ?></p> <br>
<?php if (!empty($post['image'])) : ?>
    <img src="uploads/<?= $post['image'] ?>" alt="<?= $post['image'] ?>">
<?php endif; ?>
</body>
</html>
