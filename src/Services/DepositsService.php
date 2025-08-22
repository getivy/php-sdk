<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\DepositsContract;
use Getivy\Core\Conversion;
use Getivy\Deposits\DepositRetrieveParams;
use Getivy\RequestOptions;
use Getivy\Responses\Deposits\DepositGetResponse;

final class DepositsService implements DepositsContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieves a deposit by its ID.
     *
     * @param string $id The ID of the deposit
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): DepositGetResponse {
        $args = ['id' => $id];
        [$parsed, $options] = DepositRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/deposit/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(DepositGetResponse::class, value: $resp);
    }
}
