<?php

namespace Coquardcyr\Linepay\Response;

use Coquardcyr\Linepay\Proxy\RequestResponse;

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

    }
}
