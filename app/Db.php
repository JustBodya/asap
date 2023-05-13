<?php

namespace blog\app;

class Db
{
    //SELECT * FROM users WHERE id = 1
    public function queryOne($sql)
    {
        return $sql;
    }

    //SELECT * FROM users
    public function queryAll($sql)
    {
        return $sql;
    }

    public function insertUser($sql)
    {
        return $sql;
    }
}