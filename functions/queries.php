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
                constraint fk_posts_categories
                    foreign key (id_category) references categories(id) on delete cascade 
                );";
}

function createTableRolesQuery(): string
{
    return "CREATE TABLE public.roles (
                id serial PRIMARY KEY NOT NULL,
                name varchar NOT NULL
                 );";
}

function createTableUsersQuery(): string
{
    return "CREATE TABLE public.users (
                id serial PRIMARY KEY NOT NULL,
                login varchar NOT NULL,
                password varchar NOT NULL,
                role int NOT NULL,
                constraint fk_users_roles
                          foreign key (role) references roles(id) ON DELETE CASCADE
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

function insertRolesQuery($name): string
{
    return "INSERT INTO public.roles(name) VALUES('$name');";
}

function insertUsersQuery($login, $password, $role): string
{
    return "INSERT INTO public.users(login, password, role) VALUES('$login', '$password', '$role');";
}

