<?php

declare(strict_types=1);

namespace Getivy\Contracts\Data;

use Getivy\RequestOptions;
use Getivy\Responses\Data\Consent\ConsentGetResponse;
use Getivy\Responses\Data\Consent\ConsentRevokeResponse;

interface ConsentContract
{
    /**
     * @param string $sessionID the ID of the data session to which the consent belongs
     */
    public function retrieve(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): ConsentGetResponse;

    /**
     * @param string $sessionID the ID of the data session to which the consent belongs
     */
    public function revoke(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): ConsentRevokeResponse;
}
