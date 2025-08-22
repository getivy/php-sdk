<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\SubaccountsContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\RequestOptions;
use Getivy\Responses\Subaccounts\SubaccountNewResponse;
use Getivy\Subaccounts\Subaccount;
use Getivy\Subaccounts\SubaccountCreateParams;
use Getivy\Subaccounts\SubaccountRetrieveParams;

final class SubaccountsService implements SubaccountsContract
{
    public function __construct(private Client $client) {}

    /**
     * Create a Subaccount which can be used to reconcile orders, refunds and payouts more easily.
     *
     * @param string $legalName The legal name of the Subaccount
     * @param string $mcc The merchant category code of the Subaccount. See [here](https://www.citibank.com/tts/solutions/commercial-cards/assets/docs/govt/Merchant-Category-Codes.pdf) for more information.
     * @param string $websiteURL The website url of the Subaccount
     */
    public function create(
        $legalName,
        $mcc,
        $websiteURL = null,
        ?RequestOptions $requestOptions = null
    ): SubaccountNewResponse {
        $args = [
            'legalName' => $legalName, 'mcc' => $mcc, 'websiteURL' => $websiteURL,
        ];
        $args = Util::array_filter_null($args, ['websiteURL']);
        [$parsed, $options] = SubaccountCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/subaccount/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(SubaccountNewResponse::class, value: $resp);
    }

    /**
     * Retrieve a Subaccount by id.
     *
     * @param string $id The unique identifier of the Subaccount
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): Subaccount {
        $args = ['id' => $id];
        [$parsed, $options] = SubaccountRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/subaccount/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Subaccount::class, value: $resp);
    }
}
