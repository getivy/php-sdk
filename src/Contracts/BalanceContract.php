<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Balance\BalanceRetrieveParams\Currency;
use Getivy\RequestOptions;
use Getivy\Responses\Balance\BalanceGetResponse;

interface BalanceContract
{
    /**
     * @param Currency::* $currency The currency to retrieve the balance for
     */
    public function retrieve(
        $currency,
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse;
}
