<?php

namespace blog\controllers;

class Render
{
    public function render($template, $params = []): bool|string
    {
        return $this->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu', $params),
            'content' => $this->renderTemplate($template, $params)
        ]);
    }

    public function renderTemplate($template, $params = []): bool|string
    {
        ob_start();
        extract($params);
        include '../views/' . $template . '.php';
        return ob_get_clean();
    }
}