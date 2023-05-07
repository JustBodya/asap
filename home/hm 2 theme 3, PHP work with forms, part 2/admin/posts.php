<?php
include dirname(__DIR__) . "/functions/db.php";
function createPost(string $title, mixed $content, $id_category): PDOStatement|false
{
    if (!empty($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name']; // в бд улетит имя файла
        $tmpImageName = $_FILES['image']['tmp_name'];
        $uploadFile = dirname(__DIR__) . "/uploads/" . basename($_FILES['image']['name']); // в бд улетит путь файла
        $size = getimagesize($tmpImageName)[3];
        $expansion = getimagesize($tmpImageName)['mime'];
        move_uploaded_file($tmpImageName, $uploadFile);
        $result = getConnection()->prepare("INSERT INTO posts (title, content, id_category, image) VALUES (?, ?, ?, ?)");
        $result->execute([$title, $content, $id_category, $image_name]);
    } else {
        $result = getConnection()->prepare("INSERT INTO posts (title, content, id_category) VALUES (?, ?, ?)");
        $result->execute([$title, $content, $id_category]);
    }
    return $result;
}

function saveImage($id): string
{
    $img = $_FILES['image']['name']; // в бд улетит имя файла
    $tmpImageName = $_FILES['image']['tmp_name'];
    $uploadFile = dirname(__DIR__) . "/uploads/" . basename($img); // в бд улетит путь файла
    move_uploaded_file($tmpImageName, $uploadFile);
    return $img;
}

$messages = [
    'del' => 'Пост удален',
    'add' => 'Пост добавлен',
    'edit' => 'Пост изменен',
    'del_image' => 'Изображение удалено'
];

$message = !empty($_GET['status']) ? $messages[$_GET['status']] : '';

$edit_post = [
    'id' => 0,
    'title' => '',
    'content' => '',
    'id_category' => 0,
    'image' => ''
];

$action = "add";
$formText = "добавить";
$category = 0;

//edit
if (!empty($_GET['action']) == 'edit') {
    $id = (int)$_GET['id'];
    $result = getConnection()->prepare("SELECT * FROM posts WHERE id =:id");
    $result->execute(['id' => $id]);
    $edit_post = $result->fetch();
    $action = "save";
    $formText = "изменить";
}

if (isset($_GET['action']) == 'del_image') {
    $id = (int)$_GET['id'];
    $result = getConnection()->prepare("UPDATE posts SET image = '' WHERE id = :id");
    $result->execute(['id' => $id]);
}

// save
if (!empty($_POST) && $_GET['action'] == 'save') {
    $title = strip_tags($_POST['title']);
    $content = $_POST['content'];
    $id_category = $_POST['id_category'];
    $id = (int)$_POST['id'];

    $queryImage = getConnection()->prepare("SELECT image FROM posts WHERE id = :id");
    $queryImage->execute(['id' => $id]);
    $image_name = $queryImage->fetch()['image'];

    if (!empty($_FILES['image']['name'])) {

        $image_name = saveImage($id);
    }

    $result = getConnection()->prepare("UPDATE posts SET title = :title, content = :content, id_category = :id_category, image = :image WHERE id = :id;");
    $result->execute(['title' => $title, 'content' => $content, 'id_category' => $id_category, 'image' => $image_name, 'id' => $id]);

    header("Location: /admin/posts.php?status=edit");
    die();
}

// create
if (!empty($_POST) && $_GET['action'] == 'add') {
    $title = strip_tags($_POST['title']);
    $id_category = $_POST['id_category'];
    $content = $_POST['content'];

    $result = createPost($title, $content, $id_category);

    header("Location: /admin/posts.php?status=add");
    die();
}

// delete
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    $result = getConnection()->prepare("DELETE FROM posts WHERE id = :id");
    $result->execute(['id' => $id]);

    header("Location: /admin/posts.php?status=del");
    die();
}

//read
$resultPosts = getConnection()->prepare("SELECT p.id, p.title FROM posts p ORDER BY id DESC");
$resultPosts->execute();
$posts = $resultPosts->fetchAll();

$resultOptions = getConnection()->query("SELECT id, name FROM categories");
$options = $resultOptions->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка посты</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <?php include dirname(__DIR__) . "./widgets/admin.php" ?>
</header>
<h1 class="title">CRUD Посты</h1>
<h3 class="change"><?= $message ?></h3>
<form action="?action=<?= $action ?>" method="post" enctype="multipart/form-data">
    <label for="title">Заголовок поста</label>
    <input id="title" class="input" type="text" name="title" value="<?= $edit_post['title'] ?>"> <br> <br>
    <label for="category">Категории</label>
    <input hidden type="text" name="id" value="<?= $edit_post['id'] ?>">
    <select name="id_category" id="category">
        <?php foreach ($options as $i) : ?>
            <option <?php if ($i['id'] == $edit_post['id_category']): ?> selected <?php endif ?>
                value="<?= $i['id'] ?>"><?= $i['name'] ?></option>
        <?php endforeach; ?>
    </select> <br> <br>
    <div>
        <label for="content">Контент</label>
        <textarea id="content" class="input" name="content" cols="30"><?= $edit_post['content'] ?></textarea>
    </div>
    <br>
    <label for="img">Загрузите изображение</label>
    <input type="file" id="img" name="image">
    <?php if (isset($_GET['action']) == 'edit' & !empty($edit_post['image'])) : ?>
        <img src="../uploads/<?= $edit_post['image'] ?>">
        <a href="?id=<?= $edit_post['id'] ?>&action=del_image">Удалить изображение</a>
    <?php endif; ?>
    <br>
    <input class="btn" type="submit" value="<?= $formText ?>">
</form>
<ul>
    <?php foreach ($posts as $item) : ?>
        <li>
            <a class="content" href="/post.php?id=<?= $item['id'] ?>"><?= $item['title'] ?></a>
            <a href="?id=<?= $item['id'] ?>&action=edit">[edit]</a>
            <a href="?id=<?= $item['id'] ?>&action=delete">[delete]</a>
            <hr class="line">
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
