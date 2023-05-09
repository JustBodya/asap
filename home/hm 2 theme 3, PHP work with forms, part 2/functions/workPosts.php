<?php
function createPost(string $title, mixed $content, $id_category): PDOStatement|false
{
    $image_name = null;

    if (!empty($_FILES['image']['name'])) $image_name = saveImage();

    $result = getConnection()->prepare("INSERT INTO posts (title, content, id_category, image) VALUES (?, ?, ?, ?)");
    $result->execute([$title, $content, $id_category, $image_name]);
    return $result;
}

function saveImage(): string
{
    $image_name = $_FILES['image']['name']; // в бд улетит имя файла
    $tmpImageName = $_FILES['image']['tmp_name'];
    $uploadFile = dirname(__DIR__) . "/uploads/" . basename($_FILES['image']['name']); // в бд улетит путь файла
    if (move_uploaded_file($tmpImageName, $uploadFile)) {
        echo 'Uploaded';
    } else {
        echo die('File was not uploaded');
    }
    return $image_name;
}