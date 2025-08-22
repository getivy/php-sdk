<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\RequestOptions;
use Getivy\Responses\Deposits\DepositGetResponse;

interface DepositsContract
{
    /**
     * @param string $id The ID of the deposit
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): DepositGetResponse;
}
