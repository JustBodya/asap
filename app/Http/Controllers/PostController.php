<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $title = 'Все посты';
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
        return view('admin.post.index', ['title' => $title, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $title = 'Создание поста';
        return view('admin.post.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $title = 'Изменение поста';
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
        return view('admin.post.edit', ['title' => $title, 'posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): View
    {
        return view('admin.post.destroy');
    }
}
