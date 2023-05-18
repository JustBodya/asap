<?php
namespace blog\models;

class Post extends Model
{

    public $id;
    public $title;
    public $text;
    public $category_id;

    public function getTableName()
    {
        return "posts";
    }


}