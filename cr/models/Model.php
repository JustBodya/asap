<?php

namespace blog\models;

use blog\app\Db;
use blog\interfaces\IModel;

abstract class Model implements IModel
{

    abstract protected function getTableName();

    public function getOne($id) {
        $tableName = $this->getTableName();
        return Db::getInstance()->queryOne("SELECT * FROM $tableName WHERE id = $id");
    }

    public function getAll() {
        $tableName = $this->getTableName();
        return Db::getInstance()->queryAll("SELECT * FROM $tableName");
    }
}