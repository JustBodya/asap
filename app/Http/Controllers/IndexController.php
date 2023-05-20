<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $title = 'Блог';
        $subTitle = 'Все статьи';
        $posts = [
            [
                'title' => 'Статья №1',
                'desc' => 'Описание №1',
                'created_at' => '2022-09-28 14:55',
            ],
            [
                'title' => 'Статья №1',
                'desc' => 'Описание №2',
                'created_at' => '2022-09-28 14:55',
            ],
            [
                'title' => 'Статья №1',
                'desc' => 'Описание №3',
                'created_at' => '2022-09-28 14:55',
            ]];

        return view('index', [
            'title' => $title,
            'subTitle' => $subTitle,
            'posts' => $posts
        ]);
    }
}
