<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Capabilities\CapabilityRetrieveParams\Market;
use Getivy\RequestOptions;
use Getivy\Responses\Capabilities\CapabilityGetResponse;

interface CapabilitiesContract
{
    /**
     * @param Market::* $market
     */
    public function retrieve(
        $market,
        ?RequestOptions $requestOptions = null
    ): CapabilityGetResponse;
}
