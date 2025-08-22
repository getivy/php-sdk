<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\BeneficiaryPayoutsContract;
use Getivy\Core\Conversion;
use Getivy\Core\Conversion\ListOf;
use Getivy\RequestOptions;
use Getivy\Responses\BeneficiaryPayouts\BeneficiaryPayoutNewResponseItem;

final class BeneficiaryPayoutsService implements BeneficiaryPayoutsContract
{
    public function __construct(private Client $client) {}

    /**
     * Perform a payout. This endpoint will be deprecated in favor of the new payout endpoint that will support more payout types.
     *
     * @return list<BeneficiaryPayoutNewResponseItem>
     */
    public function create(?RequestOptions $requestOptions = null): array
    {
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/beneficiary-payout/create',
            options: $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(
            new ListOf(BeneficiaryPayoutNewResponseItem::class),
            value: $resp
        );
    }
}
