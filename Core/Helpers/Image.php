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

} 