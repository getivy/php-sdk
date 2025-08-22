<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Fx\FxRetrieveRateParams\SourceCurrency;
use Getivy\Fx\FxRetrieveRateParams\TargetCurrency;
use Getivy\RequestOptions;
use Getivy\Responses\Fx\FxGetRateResponse;
use Getivy\Responses\Fx\FxGetResponse;

interface FxContract
{
    /**
     * @param string $fxID the fxId attached to the transfer
     */
    public function retrieve(
        $fxID,
        ?RequestOptions $requestOptions = null
    ): FxGetResponse;

    /**
     * @param SourceCurrency::* $sourceCurrency the source currency code
     * @param TargetCurrency::* $targetCurrency the target currency code
     * @param string $sourceAmount The amount of source currency to convert. If not provided, only the rate will be returned. Decimal places should be separated by a dot.
     */
    public function retrieveRate(
        $sourceCurrency,
        $targetCurrency,
        $sourceAmount = null,
        ?RequestOptions $requestOptions = null,
    ): FxGetRateResponse;
}
