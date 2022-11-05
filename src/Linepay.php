<?php

namespace Coquardcyr\Linepay;

use Coquardcyr\Linepay\ObjectValue\CountryCode;
use Coquardcyr\Linepay\ObjectValue\LogoType;

class Linepay
{
    public static function getLogo(CountryCode $code, LogoType $type, int $width) {
        $country = strtolower($code->getValue());
        $filename =  __DIR__ . "/assets/logo/{$country}/logo/logo_{$type->getValue()}.png";
        // Get new sizes
        list($image_width, $image_height) = getimagesize($filename);
        $ratio = $image_width / $width;
        $newheight = $image_height * $ratio;
        $thumb = imagecreatetruecolor($width, $newheight);
        $source = imagecreatefromjpeg($filename);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $width, $newheight, $image_width, $image_height);
        ob_start();
        imagepng($thumb);
        $image_data = ob_get_contents();
        ob_end_clean();
        return $image_data;
    }
}
