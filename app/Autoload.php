<?php

class Autoload
{
    private array $path = [
        'app',
        'models'
    ];

    function loadClass($className): void
    {
        foreach ($this->path as $path) {
            $fileName = "../$path/$className.php";

            if (str_contains($fileName, 'blog')) {
                $fileName = strstr($fileName, 'blog');
                $fileName = str_replace('blog', '..', $fileName);
            }
            $fileName = str_replace('\\', '/', $fileName);

            if (file_exists($fileName)) {
                include $fileName;
                break;
            }
        }
    }
}