<?php

namespace Coquardcyr\Linepay\Response;

use Coquardcyr\Linepay\Proxy\RequestResponse;
use Coquardcyr\Linepay\Utils\Clock;
use Coquardcyr\Linepay\Utils\Uniq;

abstract class AbstractResponse
{
    /**
     * @var bool
     */
    protected $is_success;
    /**
     * @var int
     */
    protected $code;
    /**
     * @var string
     */
    protected $message;

    public function __construct(RequestResponse $requestResponse)
    {
        $this->is_success = $requestResponse->getStatusCode() >= 200 && $requestResponse->getStatusCode() < 300;
        $this->code = $requestResponse->getStatusCode();
        $this->message = $requestResponse->getMessage();
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->is_success;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
