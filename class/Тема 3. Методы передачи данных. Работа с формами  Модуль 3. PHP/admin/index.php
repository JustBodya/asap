<?php
include dirname(__DIR__) . "/functions/db.php";

$messages = [
    'del' => 'Пост удален',
    'add' => 'Пост добавлен',
    'edit' => 'Пост изменен'
];

$message = !empty($_GET['status']) ? $messages[$_GET['status']] : '';

$edit_post = [
    'id' => 0,
    'title' => '',
    'content' => ''
];

$action = "add";
$formText = "добавить";

//edit
if (!empty($_GET['action']) && $_GET['action'] == 'edit') {
    $id = (int)$_GET['id'];
    $result = getConnection()->prepare("SELECT * FROM posts WHERE id =:id");
    $result->execute(['id' => $id]);
    $edit_post = $result->fetch();
    $action = "save";
    $formText = "изменить";
}

// save

if (!empty($_POST) && $_GET['action'] == 'save') {
    $title = strip_tags($_POST['title']);
    $id_category = $_POST['id_category'];
    $content = $_POST['content'];
    $id = (int)$_POST['id'];

    $result = getConnection()->prepare("UPDATE posts SET title= :title, content = :content, id_category = :id_category WHERE id = :id");

    $result->execute(['title' => $title, 'content' => $content, 'id_category' => $id_category, 'id' => $id]);
    header("Location: /admin?status=edit");
    die();
}


// create
if (!empty($_POST) && $_GET['action'] == 'add') {
    $title = strip_tags($_POST['title']);
    $id_category = $_POST['id_category'];
    $content = $_POST['content'];
    $result = getConnection()->prepare("INSERT INTO posts (title, content, id_category) VALUES (?, ?, ?)");
    $result->execute([$title, $content, $id_category]);

    header("Location: /admin?status=add");
    die();
}

// delete
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    $result = getConnection()->prepare("DELETE FROM posts WHERE id = :id");
    $result->execute(['id' => $id]);

    header("Location: /admin?status=del");
    die();
}
//read
$resultPosts = getConnection()->prepare("SELECT p.id, p.title FROM posts p ORDER BY id DESC");
$resultPosts->execute();
$posts = $resultPosts->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include dirname(__DIR__) . "./widgets/admin.php" ?>
<h2>welcome CRUD</h2>
<h3><?= $message ?></h3>
<form action="?action=<?= $action ?>" method="post">
    <label for="title">Заголовок поста</label>
    <input id="title" type="text" name="title" value="<?= $edit_post['title'] ?>"> <br> <br>
    <label for="category">Категории</label>
    <input hidden type="text" name="id" value="<?= $edit_post['id'] ?>">
    <select name="id_category" id="category">
        <option value="9">политика</option>
        <option value="10">спорт</option>
        <option value="11">искусство</option>
        <option value="12">книги</option>
        <option value="13">машины</option>
        <option value="14">техника</option>
        <option value="14">история</option>
    </select> <br> <br>
    <div class="formfield">
        <label for="content">Контент</label>
        <textarea id="content" name="content" cols="30"><?= $edit_post['content'] ?></textarea>
    </div>
    <br> <br>
    <input type="submit" value="<?= $formText ?>">
</form>
<?php foreach ($posts as $item) : ?>
    <li>
        <a href="/post.php?id=<?= $item['id'] ?>"><?= $item['title'] ?></a>
        <a href="?id=<?= $item['id'] ?>&action=edit">[edit]</a>
        <a href="?id=<?= $item['id'] ?>&action=delete">[delete]</a>
    </li>
<?php endforeach; ?>
</body>
</html>
