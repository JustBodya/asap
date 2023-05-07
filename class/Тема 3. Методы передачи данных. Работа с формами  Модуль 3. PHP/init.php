<?php
include "./functions/db.php";
include "./functions/queries.php";

$createTableCategories = getConnection()->query(createTableCategoriesQuery());

$createTablePosts = getConnection()->query(createTablePostsQuery());

$categoryName = 'newCat';

$insertIntoCategories = getConnection()->prepare(insertCategoryQuery($categoryName));

$insertIntoCategories->execute();

$title = 'newTit';
$content = "content";
$id_category = 1;

$insertIntoPosts = getConnection()->prepare(insertPostQuery($title, $content, $id_category));

$insertIntoPosts->execute();



