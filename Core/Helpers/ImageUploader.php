<?php


namespace Core\Helpers;

class ImageUploader
{
    public static function upload($file, $name, $dest)
    {
        $extension = Image::getExtension($file['name']);
        move_uploaded_file($file['tmp_name'], $dest . $name . $extension);
    }

    public static function crop($file, $w, $h, $dest = null, $name = null)
    {
        // Get new dimensions
        list($width, $height) = getimagesize($file);
        $new_width = $w;
        $new_height = $h;

        // Resample
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($file);

        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($image_p, !is_null($dest) && !is_null($name) ? $dest . $name : null, 100);
    }
} 