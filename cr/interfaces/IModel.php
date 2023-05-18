<?php
namespace blog\interfaces;

interface IModel
{
    public function getOne($id);
    public function getAll();
}