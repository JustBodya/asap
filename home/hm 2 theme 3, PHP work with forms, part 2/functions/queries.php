<?php

function createTableCategoriesQuery(): string
{
    return "CREATE TABLE public.categories (
                id serial PRIMARY KEY NOT NULL,
                name varchar NOT NULL
                 );";
}

function createTablePostsQuery(): string
{
    return "CREATE TABLE public.posts (
                id serial PRIMARY KEY NOT NULL,
                title varchar NOT NULL,
                content varchar NOT NULL,
                id_category int NOT NULL,
                image varchar,
                FOREIGN KEY (id_category) REFERENCES public.categories (id) ON DELETE CASCADE
                );";

}

function insertCategoryQuery($name_category): string
{
    return "INSERT INTO public.categories(name) VALUES('$name_category');";
}

function insertPostQuery($title, $content, $id_category, $image = 0): string
{
    return "INSERT INTO public.posts(title, content, id_category, image) VALUES('$title', '$content', '$id_category', '$image');";
}