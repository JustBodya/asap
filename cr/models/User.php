<?php

namespace blog\models;

class User extends Model
{

    public $id;
    public $login;
    public $pass;
    protected $db;

    public function getTableName()
    {
        return "users";
    }

}

