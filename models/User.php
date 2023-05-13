<?php

namespace blog\models;

use blog\app\Db;

class User
{
    public int $id;
    public string $login;
    public string $password;
    public int $role;
    private Db $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        return $this->db->queryOne("SELECT * FROM users WHERE id = $id");
    }

    public function getAll()
    {
        return $this->db->queryAll("SELECT * FROM users");
    }

    public function insert($id, $login, $password, $role)
    {
        return $this->db->insertUser("INSERT INTO users SET id = $id, login = $login, password = $password, role = $role");
    }
}