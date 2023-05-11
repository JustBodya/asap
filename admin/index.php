<?php
include dirname(__DIR__) . '/functions/auth.php';
?>
<?php if (isAdmin()) : ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Главная админка</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
    <header>
        <?php include dirname(__DIR__) . "./widgets/admin.php" ?>
    </header>
    <h1 class="title">Главная админка</h1>

    </body>
    </html>
<?php else : ?>
    <?php die('You do not have access') ?>
<?php endif; ?>