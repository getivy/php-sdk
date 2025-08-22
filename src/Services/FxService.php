<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\FxContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\Fx\FxRetrieveParams;
use Getivy\Fx\FxRetrieveRateParams;
use Getivy\Fx\FxRetrieveRateParams\SourceCurrency;
use Getivy\Fx\FxRetrieveRateParams\TargetCurrency;
use Getivy\RequestOptions;
use Getivy\Responses\Fx\FxGetRateResponse;
use Getivy\Responses\Fx\FxGetResponse;

final class FxService implements FxContract
{
    public function __construct(private Client $client) {}

    /**
     * Retrieve the details of a past fx transfer using the fxId.
     *
     * @param string $fxID the fxId attached to the transfer
     */
    public function retrieve(
        $fxID,
        ?RequestOptions $requestOptions = null
    ): FxGetResponse {
        $args = ['fxID' => $fxID];
        [$parsed, $options] = FxRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/fx/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(FxGetResponse::class, value: $resp);
    }

    /**
     * Retrieve the current exchange rate for a given currency pair. The rate is not guaranteed for any following transactions.
     *
     * @param SourceCurrency::* $sourceCurrency the source currency code
     * @param TargetCurrency::* $targetCurrency the target currency code
     * @param string $sourceAmount The amount of source currency to convert. If not provided, only the rate will be returned. Decimal places should be separated by a dot.
     */
    public function retrieveRate(
        $sourceCurrency,
        $targetCurrency,
        $sourceAmount = null,
        ?RequestOptions $requestOptions = null,
    ): FxGetRateResponse {
        $args = [
            'sourceCurrency' => $sourceCurrency,
            'targetCurrency' => $targetCurrency,
            'sourceAmount' => $sourceAmount,
        ];
        $args = Util::array_filter_null($args, ['sourceAmount']);
        [$parsed, $options] = FxRetrieveRateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/fx/retrieve-rate',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(FxGetRateResponse::class, value: $resp);
    }
}
