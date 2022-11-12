<?php

namespace Coquardcyr\Linepay\Proxy;

use Coquardcyr\Linepay\Request\AbstractRequest;

interface HTTPClient
{
    /**
     * Send the HTTP request.
     *
     * @param AbstractRequest $request Request to send.
     * @return RequestResponse Response.
     */
    public function send(AbstractRequest $request): RequestResponse;
}
