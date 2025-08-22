<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\RequestOptions;
use Getivy\Responses\Subaccounts\SubaccountNewResponse;
use Getivy\Subaccounts\Subaccount;

interface SubaccountsContract
{
    /**
     * @param string $legalName The legal name of the Subaccount
     * @param string $mcc The merchant category code of the Subaccount. See [here](https://www.citibank.com/tts/solutions/commercial-cards/assets/docs/govt/Merchant-Category-Codes.pdf) for more information.
     * @param string $websiteURL The website url of the Subaccount
     */
    public function create(
        $legalName,
        $mcc,
        $websiteURL = null,
        ?RequestOptions $requestOptions = null,
    ): SubaccountNewResponse;

    /**
     * @param string $id The unique identifier of the Subaccount
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): Subaccount;
}
