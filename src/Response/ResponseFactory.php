<?php

namespace Coquardcyr\Linepay\Response;

use Coquardcyr\Linepay\Proxy\RequestResponse;
use Coquardcyr\Linepay\Request\AbstractRequest;
use Coquardcyr\Linepay\Request\ConfirmPaymentRequest;
use Coquardcyr\Linepay\Request\RefundRequest;

class ResponseFactory
{
    public function make(AbstractRequest $request, RequestResponse $response): AbstractResponse {
        switch (get_class($request)) {
            case ConfirmPaymentRequest::class:
                return new ConfirmPaymentResponse($response);
            case RefundRequest::class:
                return new RefundResponse($response);
            default:
                return new RequestingPaymentResponse($response);
        }
    }
}