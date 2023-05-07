<?php
include "./functions/db.php";
include "./functions/queries.php";

getConnection()->query(createTableCategoriesQuery());

getConnection()->query(createTablePostsQuery());

getConnection()->query(insertCategoryQuery('Политика'));
getConnection()->query(insertCategoryQuery('Спорт'));
getConnection()->query(insertCategoryQuery('Искусство'));
getConnection()->query(insertCategoryQuery('Музыка'));
getConnection()->query(insertCategoryQuery('Актёры'));
getConnection()->query(insertCategoryQuery('Сериалы'));
getConnection()->query(insertCategoryQuery('Игры'));
getConnection()->query(insertCategoryQuery('История'));
getConnection()->query(insertCategoryQuery('Космос'));


getConnection()->query(insertPostQuery('Джо Байден', 'Президент США', '11'));
getConnection()->query(insertPostQuery('Владимир Путин', 'Президент РФ', '11'));
getConnection()->query(insertPostQuery('Усейн Болт', 'Бегун бежит бегом', '12'));
getConnection()->query(insertPostQuery('Мухаммед Али', 'Тот ещё драчун', '12'));
getConnection()->query(insertPostQuery('Леонардо да Винчи', 'Рисует, изобретает. Одним словом гений своего времени', '13'));
getConnection()->query(insertPostQuery('Честер Беннингтон', 'Солист группы "Linkin park"', '14'));
getConnection()->query(insertPostQuery('Тилль Линдеманн', 'Солист группы "Rammstein"', '14'));
getConnection()->query(insertPostQuery('Том Хэнкс', 'Актёр Голливуда', '15'));
getConnection()->query(insertPostQuery('Александр Петров', 'Не снимайся больше пж', '15'));
getConnection()->query(insertPostQuery('Артур Морган', 'Ковбой на диком западе. ЙЯЯЯЯ', '17'));
getConnection()->query(insertPostQuery('Геральт из Ривии', 'Любит женщин, бухло и хорошую драку. И также поиграть в гвинт', '17'));
getConnection()->query(insertPostQuery('Владимир Красное Солнышко', 'Русь крестил', '18'));
getConnection()->query(insertPostQuery('Меркурий', 'Самая близкая планета к Солнцу. Скорее всего ей очень жарко', '19'));







