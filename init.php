<?php
include "./functions/db.php";
include "./functions/queries.php";

getConnection()->query(createTableCategoriesQuery());

getConnection()->query(createTablePostsQuery());

getConnection()->query(createTableRolesQuery());

getConnection()->query(createTableUsersQuery());

getConnection()->query(insertCategoryQuery('Политика'));
getConnection()->query(insertCategoryQuery('Спорт'));
getConnection()->query(insertCategoryQuery('Искусство'));
getConnection()->query(insertCategoryQuery('Музыка'));
getConnection()->query(insertCategoryQuery('Актёры'));
getConnection()->query(insertCategoryQuery('Сериалы'));
getConnection()->query(insertCategoryQuery('Игры'));
getConnection()->query(insertCategoryQuery('История'));
getConnection()->query(insertCategoryQuery('Космос'));


getConnection()->query(insertPostQuery('Джо Байден', 'Президент США', '1', 'joeBiden.jpg'));
getConnection()->query(insertPostQuery('Владимир Путин', 'Президент РФ', '1', 'putin.jpg'));
getConnection()->query(insertPostQuery('Усейн Болт', 'Бегун бежит бегом', '2', 'usainbolt.jpg'));
getConnection()->query(insertPostQuery('Мухаммед Али', 'Тот ещё драчун', '2', 'muhammad.jpg'));
getConnection()->query(insertPostQuery('Леонардо да Винчи', 'Рисует, изобретает. Одним словом гений своего времени', '3', 'leonardo.jpg'));
getConnection()->query(insertPostQuery('Честер Беннингтон', 'Солист группы "Linkin park"', '4', 'chester.jpg'));
getConnection()->query(insertPostQuery('Тилль Линдеманн', 'Солист группы "Rammstein"', '4', 'till.jpeg'));
getConnection()->query(insertPostQuery('Том Хэнкс', 'Актёр Голливуда', '5', 'tom.jpg'));
getConnection()->query(insertPostQuery('Александр Петров', 'Не снимайся больше пж', '5', 'petrov.jpg'));
getConnection()->query(insertPostQuery('Артур Морган', 'Ковбой на диком западе. ЙЯЯЯЯ', '7', 'Arthur Morgan.jpg'));
getConnection()->query(insertPostQuery('Геральт из Ривии', 'Любит женщин, бухло и хорошую драку. И также поиграть в гвинт', '7', 'Geralt.jpg'));
getConnection()->query(insertPostQuery('Владимир Красное Солнышко', 'Русь крестил', '8', 'redsun.jpg'));
getConnection()->query(insertPostQuery('Меркурий', 'Самая близкая планета к Солнцу. Скорее всего ей очень жарко', '9', 'mercury.jpg'));

getConnection()->query(insertRolesQuery('admin'));
getConnection()->query(insertRolesQuery('user'));

getConnection()->query(insertUsersQuery('admin', '123', '1'));