<?php


namespace blog\controllers;


class Controller extends Render
{
    public Render $render;

    function __construct(Render $render)
    {
        $this->render = $render;
    }

    public function runAction($action): void
    {
        $method = 'action' . ucfirst($action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('404 нет такого экшена');
        }
    }
}