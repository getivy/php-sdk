<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\PayoutsContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\Payouts\Payout;
use Getivy\Payouts\PayoutCreateParams;
use Getivy\Payouts\PayoutCreateParams\Currency;
use Getivy\Payouts\PayoutCreateParams\Destination;
use Getivy\Payouts\PayoutListParams;
use Getivy\Payouts\PayoutListParams\Type;
use Getivy\Payouts\PayoutRetrieveParams;
use Getivy\RequestOptions;
use Getivy\Responses\Payouts\PayoutGetResponse;
use Getivy\Responses\Payouts\PayoutListResponse;

final class PayoutsService implements PayoutsContract
{
    public function __construct(private Client $client) {}

    /**
     * Create a payout for a merchant.
     *
     * @param float $amount The payout amount in decimal format. The minimum amount is 0.01.
     * @param Currency::* $currency The payout currency
     * @param Destination $destination The payout destination
     * @param array<string,
     * mixed,> $metadata This can be used to store any additional information you need to associate with this payout
     * @param string $paymentReference The payout payment reference. This is visible to the receiving party, if possible.
     */
    public function create(
        $amount,
        $currency,
        $destination,
        $metadata = null,
        $paymentReference = null,
        ?RequestOptions $requestOptions = null,
    ): Payout {
        $args = [
            'amount' => $amount,
            'currency' => $currency,
            'destination' => $destination,
            'metadata' => $metadata,
            'paymentReference' => $paymentReference,
        ];
        $args = Util::array_filter_null($args, ['metadata', 'paymentReference']);
        [$parsed, $options] = PayoutCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/payout/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Payout::class, value: $resp);
    }

    /**
     * Retrieve a payout object by id.
     *
     * @param string $id The payout ID
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): PayoutGetResponse {
        $args = ['id' => $id];
        [$parsed, $options] = PayoutRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/payout/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(PayoutGetResponse::class, value: $resp);
    }

    /**
     * List payouts for a merchant.
     *
     * @param float $limit
     * @param float $skip
     * @param Type::* $type
     */
    public function list(
        $limit = null,
        $skip = null,
        $type = null,
        ?RequestOptions $requestOptions = null,
    ): PayoutListResponse {
        $args = ['limit' => $limit, 'skip' => $skip, 'type' => $type];
        $args = Util::array_filter_null($args, ['limit', 'skip', 'type']);
        [$parsed, $options] = PayoutListParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/payout/list',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(PayoutListResponse::class, value: $resp);
    }
}
