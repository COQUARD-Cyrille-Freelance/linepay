<?php

namespace Coquardcyr\Linepay\Request;

use Coquardcyr\Linepay\ObjectValue\Currency;
use Coquardcyr\Linepay\ObjectValue\Price;
use Coquardcyr\Linepay\Utils\Clock;
use Coquardcyr\Linepay\Utils\Uniq;

class ConfirmPaymentRequest extends AbstractRequest
{
    /**
     * @var Price
     */
    protected $amount;
    /**
     * @var Currency
     */
    protected $currency;
    /**
     * @var string
     */
    protected $transaction_id;

    /**
     * @param Price $amount
     * @param Currency $currency
     * @param string $transaction_id
     */
    public function __construct(Price $amount, Currency $currency, string $transaction_id, Uniq $uniq = null, Clock $clock = null)
    {
        parent::__construct($uniq, $clock);
        $this->amount = $amount;
        $this->currency = $currency;
        $this->transaction_id = $transaction_id;
        $this->path = "/v3/payments/${transaction_id}/confirm";
        $this->body = json_encode([
            'amount' => $amount->getValue(),
            'currency' => $currency->getValue(),
        ]);
    }


}
