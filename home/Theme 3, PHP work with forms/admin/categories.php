<?php
include dirname(__DIR__) . "/functions/db.php";

$messages = [
    'add' => 'Категория добавлена',
    'del' => 'Категория удалена',
    'edit' => 'Категория изменена'
];

$edit = [
    'id' => 0,
    'name' => ''
];

$message = !empty($_GET['status']) ? $messages[$_GET['status']] : '';

$action = 'add';
$formText = 'добавить';

// create
if (!empty($_POST) && $_GET['action'] == 'add') {
    $name = strip_tags($_POST['name']);
    $query = getConnection()->prepare("INSERT INTO categories (name) VALUES (:name)");
    $query->execute(['name' => $name]);
    header("Location: /admin/categories.php?status=add");
    die();
}

// delete
if (isset($_GET['action']) && $_GET['action'] == 'del') {
    $id = $_GET['id'];
    $query = getConnection()->prepare("DELETE FROM categories WHERE id = :id");
    $query->execute(['id' => $id]);
    header("Location: /admin/categories.php?status=del");
    die();
}

// edit
if (!empty($_GET['action']) && $_GET['action'] == 'edit') {
    $id = (int)$_GET['id'];
    $result = getConnection()->prepare("SELECT * FROM categories WHERE id =:id");
    $result->execute(['id' => $id]);
    $edit = $result->fetch();
    $action = "save";
    $formText = "изменить";
}

// save
if (!empty($_POST) && $_GET['action'] == 'save') {
    $id = (int)$_POST['id'];
    $name = strip_tags($_POST['name']);
    $query = getConnection()->prepare("UPDATE categories SET name = :name WHERE id = :id");
    $query->execute(['name' => $name, 'id' => $id]);
    header("Location: /admin/categories.php?status=edit");
    die();
}

$result = getConnection()->query("SELECT id, name FROM categories ORDER BY id DESC;");
$printCategories = $result->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка категории</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <?php include dirname(__DIR__) . "/widgets/admin.php" ?>
</header>
<h1 class="title">CRUD Категории</h1>
<form action="?action=<?= $action ?>" method="post">
    <label for="name">Название категории</label>
    <input id="name" class="input" type="text" name="name" value="<?= $edit['name'] ?>"> <br> <br>
    <input hidden type="text" name="id" value="<?= $edit['id'] ?>">
    <input class="btn" type="submit" value="<?= $formText ?>">
</form>
<h3 class="change"><?= $message ?></h3>
<ul>
    <?php foreach ($printCategories as $i) : ?>
        <li>
            <?= $i['name'] ?>
            <a href="?id=<?= $i['id'] ?>&action=edit">[edit]</a>
            <a href="?id=<?= $i['id'] ?>&action=del">[delete]</a>
            <hr class="line">
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
