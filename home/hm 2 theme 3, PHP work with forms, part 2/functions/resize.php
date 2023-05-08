<?php

function resizeImage($file, $w = 200, $h = 300, $crop = false)
{
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($w / $h > $r) {
        $newwidth = $h * $r;
        $newheight = $h;
    } else {
        $newheight = $w / $r;
        $newwidth = $w;
    }

    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor((int)$newwidth, (int)$newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, (int)$newwidth, (int)$newheight, $width, $height);

    return $dst;
}