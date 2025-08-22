<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\RequestOptions;
use Getivy\Responses\BeneficiaryPayouts\BeneficiaryPayoutNewResponseItem;

interface BeneficiaryPayoutsContract
{
    /**
     * @return list<BeneficiaryPayoutNewResponseItem>
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): array;
}
