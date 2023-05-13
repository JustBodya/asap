<?php

namespace blog\models;
class Post
{
    public int $id;
    public string $title;
    public string $content;
    public int $id_category;
    public string $image;

    public function __construct($id, $title, $content, $id_category, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->id_category = $id_category;
        $this->image = $image;
    }

    public function printSomeText(): void
    {
        echo 'hello';
    }

    public function insert($id, $title, $content, $id_category, $image)
    {
        return $this->db->insertUser("INSERT INTO users SET id = $id, title = $title, content = $content, id_category = $id_category, image = $image");
    }
}