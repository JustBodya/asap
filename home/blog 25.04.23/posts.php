<?php
include __DIR__ . "/functions/dbConnect.php";

$postId = (int)$_GET['id'];
$selectAllPosts = "SELECT * FROM public.posts where id_category=:id;";
$posts = getConnection()->prepare($selectAllPosts);
$posts->execute([':id' => $postId]);
$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
</head>
<body>
<?php foreach ($posts as $item): ?>
    <h2><?= $item['title'] ?> </h2>
<?php endforeach; ?>
</body>
</html>
