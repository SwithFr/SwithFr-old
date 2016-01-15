<?php


namespace Core\Helpers;


class Image
{
    /**
     * Retourne l'extension d'une image
     * @param $imageName
     * @return string
     */
    public static function getExtension($imageName)
    {
        return '.' . @end(explode('.',$imageName));
    }

    public static function getWidth($imageName)
    {
        return self::getSize($imageName)[0];
    }

    public static function getHeight($imageName)
    {
        return self::getSize($imageName)[1];
    }

    public static function getHtmlAttr($imageName){
        return self::getSize($imageName)[3];
    }

    public static function getSize($imageName)
    {
        return getimagesize(BASE . DS . 'App' . DS . 'Webroot' . DS . 'img' . DS . $imageName);
    }

} 