<?php

namespace Coquardcyr\Linepay;

use Coquardcyr\Linepay\ObjectValue\CountryCode;
use Coquardcyr\Linepay\ObjectValue\LogoType;
use Coquardcyr\Linepay\Proxy\HTTPClient;
use Coquardcyr\Linepay\Request\AbstractRequest;

class Linepay
{
    /**
     * @var string
     */
    protected $id_channel;
    /**
     * @var string
     */
    protected $secret_channel;
    /**
     * @var string
     */
    protected $base_url;

    /**
     * @var HTTPClient
     */
    protected $client;

    /**
     * @param string $id_channel
     * @param string $secret_channel
     */
    public function __construct(string $id_channel, string $secret_channel, bool $dev = false, HTTPClient $client = null)
    {
        $this->id_channel = $id_channel;
        $this->secret_channel = $secret_channel;
        $this->base_url = $dev ? 'https://sandbox-api-pay.line.me': 'https://api-pay.line.me';
        $this->client = $client;
    }

    public function prepare(AbstractRequest $request) {
        $request->setChannelId($this->id_channel);
        $request->setChannelSecret($this->secret_channel);
        $request->setBaseUrl($this->base_url);
    }

    public function run(AbstractRequest $request) {
        if(! $this->client) {
            return;
        }

    }

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
