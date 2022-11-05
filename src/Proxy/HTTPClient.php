<?php

namespace Coquardcyr\Linepay\Proxy;

use Coquardcyr\Linepay\Request\AbstractRequest;

interface HTTPClient
{
    public function send(AbstractRequest $request): RequestResponse;
}
