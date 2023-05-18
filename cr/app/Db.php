<?php
namespace blog\app;

use blog\traits\TSigletone;
/**
 * Class Db задача низкоуровневая работа с БД
 */

final class Db {

   use TSigletone;

    public function query($sql) {}

    //SELECT * FROM users WHERE id = 1
    public function queryOne($sql)
    {
        return $sql;
    }

    //SELECT * FROM users
    public function queryAll($sql) {
        return $sql;
    }

}