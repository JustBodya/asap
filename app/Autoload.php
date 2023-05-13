<?php

class Autoload
{
    function loadClass($className): void
    {
        $fileName = "../$className.php";
        if (str_contains($fileName, 'blog')) {
            $fileName = strstr($fileName, 'blog');
            $fileName = str_replace('blog', '..', $fileName);
        }
        $fileName = str_replace('\\', '/', $fileName);
        var_dump($fileName);

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}