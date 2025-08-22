<?php

declare(strict_types=1);

namespace Getivy\Services\Data;

use Getivy\Client;
use Getivy\Contracts\Data\ConsentContract;
use Getivy\Core\Conversion;
use Getivy\Data\Consent\ConsentRetrieveParams;
use Getivy\Data\Consent\ConsentRevokeParams;
use Getivy\RequestOptions;
use Getivy\Responses\Data\Consent\ConsentGetResponse;
use Getivy\Responses\Data\Consent\ConsentRevokeResponse;

final class ConsentService implements ConsentContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieves the details of a consent by session ID.
     *
     * @param string $sessionID the ID of the data session to which the consent belongs
     */
    public function retrieve(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): ConsentGetResponse {
        $args = ['sessionID' => $sessionID];
        [$parsed, $options] = ConsentRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/data/consent/details',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(ConsentGetResponse::class, value: $resp);
    }

    /**
     * Revokes a consent by session ID.
     *
     * @param string $sessionID the ID of the data session to which the consent belongs
     */
    public function revoke(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): ConsentRevokeResponse {
        $args = ['sessionID' => $sessionID];
        [$parsed, $options] = ConsentRevokeParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/data/consent/revoke',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(ConsentRevokeResponse::class, value: $resp);
    }
}
