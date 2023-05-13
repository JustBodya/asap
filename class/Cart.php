<?php

class Cart
{
    public $listGoods;

    public function __construct($listGoods = [])
    {
        $this->listGoods = $listGoods;
    }

    public function addGood($name)
    {
        $this->listGoods[] = $name;
    }

    public function getAllGoods()
    {
        return $this->listGoods;
    }
}

$array = [];

$cart = new Cart($array);

$cart->addGood('banana');
$cart->addGood('apple');


print_r($cart->getAllGoods());
