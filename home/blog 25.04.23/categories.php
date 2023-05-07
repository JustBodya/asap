<?php
include __DIR__ . "/functions/dbConnect.php";

$selectAllCategories = "SELECT * FROM public.categories";

$categories = getConnection()->query($selectAllCategories)->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>categories</title>
</head>
<body>
<?php foreach ($categories as $item): ?>
    <h2>
        <a href="posts.php?id=<?= $item['id'] ?>"><?= $item['name'] ?> </a>
    </h2>
<?php endforeach; ?>
</body>
</html>
