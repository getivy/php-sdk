<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Mandates\Mandate;
use Getivy\RequestOptions;
use Getivy\Responses\Mandates\MandateLookupResponse;
use Getivy\Responses\Mandates\MandateRevokeResponse;

interface MandatesContract
{
    /**
     * @param string $id A valid mandate id. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): Mandate;

    /**
     * @param string $referenceID A valid mandate reference id. This is set by the merchant during the checkout session when the mandate setup is initiated.
     */
    public function lookup(
        $referenceID,
        ?RequestOptions $requestOptions = null
    ): MandateLookupResponse;

    /**
     * @param string $id A valid mandate id. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    public function revoke(
        $id,
        ?RequestOptions $requestOptions = null
    ): MandateRevokeResponse;
}
