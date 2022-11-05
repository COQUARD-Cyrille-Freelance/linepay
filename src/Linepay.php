<?php

namespace Coquardcyr\Linepay;

use Coquardcyr\Linepay\ObjectValue\CountryCode;
use Coquardcyr\Linepay\ObjectValue\LogoType;

class Linepay
{
    public static function getLogo(CountryCode $code, LogoType $type, int $width) {
        $filename = '';
        // Get new sizes
        list($image_width, $image_height) = getimagesize($filename);

        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($filename);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        ob_start();
        imagepng($thumb);
        $image_data = ob_get_contents();
        ob_end_clean();
        return $image_data;
    }
}
