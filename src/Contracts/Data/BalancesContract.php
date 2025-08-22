<?php

declare(strict_types=1);

namespace Getivy\Contracts\Data;

use Getivy\RequestOptions;
use Getivy\Responses\Data\Balances\BalanceListResponse;

interface BalancesContract
{
    /**
     * @param string $sessionID the ID of the data session to retrieve account balances for
     */
    public function list(
        $sessionID,
        ?RequestOptions $requestOptions = null
    ): BalanceListResponse;
}
