<?php

class Unit
{
    public $name;
    public $hp;

    public function say()
    {
        echo $this->name = 'Conan';
    }

}

$unit1 = new Unit();
$unit1->name = "Conan";
$unit1->hp = 200;
$unit1->say();