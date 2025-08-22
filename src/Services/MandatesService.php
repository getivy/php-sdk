<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\MandatesContract;
use Getivy\Core\Conversion;
use Getivy\Mandates\Mandate;
use Getivy\Mandates\MandateLookupParams;
use Getivy\Mandates\MandateRetrieveParams;
use Getivy\Mandates\MandateRevokeParams;
use Getivy\RequestOptions;
use Getivy\Responses\Mandates\MandateLookupResponse;
use Getivy\Responses\Mandates\MandateRevokeResponse;

final class MandatesService implements MandatesContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieves a direct debit mandate with mandate id.
     *
     * @param string $id A valid mandate id. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): Mandate {
        $args = ['id' => $id];
        [$parsed, $options] = MandateRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/mandate/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Mandate::class, value: $resp);
    }

    /**
     * Returns a Direct Debit Mandate when a valid mandate referenceId is given.
     *
     * @param string $referenceID A valid mandate reference id. This is set by the merchant during the checkout session when the mandate setup is initiated.
     */
    public function lookup(
        $referenceID,
        ?RequestOptions $requestOptions = null
    ): MandateLookupResponse {
        $args = ['referenceID' => $referenceID];
        [$parsed, $options] = MandateLookupParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/mandate/lookup',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(MandateLookupResponse::class, value: $resp);
    }

    /**
     * Revokes a Direct Debit Mandate with a valid mandate id.
     *
     * @param string $id A valid mandate id. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    public function revoke(
        $id,
        ?RequestOptions $requestOptions = null
    ): MandateRevokeResponse {
        $args = ['id' => $id];
        [$parsed, $options] = MandateRevokeParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/mandate/revoke',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(MandateRevokeResponse::class, value: $resp);
    }
}
