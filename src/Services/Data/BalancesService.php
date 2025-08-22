<?php

declare(strict_types=1);

namespace Getivy\Services\Data;

use Getivy\Client;
use Getivy\Contracts\Data\BalancesContract;
use Getivy\Core\Conversion;
use Getivy\Data\Balances\BalanceListParams;
use Getivy\RequestOptions;
use Getivy\Responses\Data\Balances\BalanceListResponse;

final class BalancesService implements BalancesContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieves the list of account balances for a given data session.
     *
     * @param string $sessionID the ID of the data session to retrieve account balances for
     */
    public function list(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): BalanceListResponse {
        $args = ['sessionID' => $sessionID];
        [$parsed, $options] = BalanceListParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/data/account-balances/list',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(BalanceListResponse::class, value: $resp);
    }
}
