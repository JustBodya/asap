<?php
namespace blog\app;

class Autoload
{

    function loadClass($className) {

    $fileName = str_replace("\\","/",$className);
    $fileName = str_replace("blog/", "../", $fileName);
    $fileName = "$fileName.php";

            if (file_exists($fileName)) {
                include $fileName;
            }

    }
}