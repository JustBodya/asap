<?php
include "functions/dbConnect.php";
include "functions/generateData.php";

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
                FOREIGN KEY (id_category) REFERENCES public.categories (id)
                );";
}

function insertCategoryQuery(): string
{
    return "INSERT INTO public.categories(name_category) VALUES('политика');";
}

function insertPostQuery(): string
{
    $generator = generateContent();
    return "INSERT INTO public.posts(title, content, id_category) VALUES('боец', 'мухаммед али', '10');";
}

$execute = getConnection()->prepare(/*NameFunction*/);
$execute->execute();