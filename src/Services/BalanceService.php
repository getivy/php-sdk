<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Balance\BalanceRetrieveParams;
use Getivy\Balance\BalanceRetrieveParams\Currency;
use Getivy\Client;
use Getivy\Contracts\BalanceContract;
use Getivy\Core\Conversion;
use Getivy\RequestOptions;
use Getivy\Responses\Balance\BalanceGetResponse;

final class BalanceService implements BalanceContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieve the balance of your Ivy account. The balance is the money currently available on your Ivy account. It is broken down by currency.
     *
     * @param Currency::* $currency The currency to retrieve the balance for
     */
    public function retrieve(
        $currency,
        ?RequestOptions $requestOptions = null
    ): BalanceGetResponse {
        $args = ['currency' => $currency];
        [$parsed, $options] = BalanceRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/balance/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(BalanceGetResponse::class, value: $resp);
    }
}
