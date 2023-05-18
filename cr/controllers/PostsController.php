<?php

namespace blog\controllers;


use blog\models\Post;

class PostsController extends Controller
{
    public function actionIndex()
    {
        // $id = $_GET['id'];
        // $post = (new Post())->getOne($id);
        $posts = (new Post())->getAll();

        echo $this->render('posts', [
            'posts' => $posts
        ]);
    }
}