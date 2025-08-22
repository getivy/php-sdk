<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\ReturnsContract;
use Getivy\Core\Conversion;
use Getivy\RequestOptions;
use Getivy\Responses\Returns\ReturnGetResponse;
use Getivy\Responses\Returns\ReturnNewResponse;
use Getivy\Returns\ReturnCreateParams;
use Getivy\Returns\ReturnRetrieveParams;

final class ReturnsService implements ReturnsContract
{
    public function __construct(private Client $client) {}

    /**
     * Creates a return for a deposit.
     *
     * @param string $depositID The ID of the associated deposit
     */
    public function create(
        $depositID,
        ?RequestOptions $requestOptions = null
    ): ReturnNewResponse {
        $args = ['depositID' => $depositID];
        [$parsed, $options] = ReturnCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/return/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(ReturnNewResponse::class, value: $resp);
    }

    /**
     * Retrieves a return by its ID.
     *
     * @param string $id The ID of the return
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): ReturnGetResponse {
        $args = ['id' => $id];
        [$parsed, $options] = ReturnRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/return/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(ReturnGetResponse::class, value: $resp);
    }
}
