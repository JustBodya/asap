<?php

namespace blog\controllers;

class IndexController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }
}