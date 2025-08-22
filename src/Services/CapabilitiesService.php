<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Capabilities\CapabilityRetrieveParams;
use Getivy\Capabilities\CapabilityRetrieveParams\Market;
use Getivy\Client;
use Getivy\Contracts\CapabilitiesContract;
use Getivy\Core\Conversion;
use Getivy\RequestOptions;
use Getivy\Responses\Capabilities\CapabilityGetResponse;

final class CapabilitiesService implements CapabilitiesContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieve the capabilities of your Ivy account. The capabilities are broken down by market and by product.
     *
     * @param Market::* $market
     */
    public function retrieve(
        $market,
        ?RequestOptions $requestOptions = null
    ): CapabilityGetResponse {
        $args = ['market' => $market];
        [$parsed, $options] = CapabilityRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/merchant/capabilities/details',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(CapabilityGetResponse::class, value: $resp);
    }
}
