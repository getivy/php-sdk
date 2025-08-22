<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Payouts\Payout;
use Getivy\Payouts\PayoutCreateParams\Currency;
use Getivy\Payouts\PayoutCreateParams\Destination;
use Getivy\Payouts\PayoutListParams\Type;
use Getivy\RequestOptions;
use Getivy\Responses\Payouts\PayoutGetResponse;
use Getivy\Responses\Payouts\PayoutListResponse;

interface PayoutsContract
{
    /**
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
    ): Payout;

    /**
     * @param string $id The payout ID
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): PayoutGetResponse;

    /**
     * @param float $limit
     * @param float $skip
     * @param Type::* $type
     */
    public function list(
        $limit = null,
        $skip = null,
        $type = null,
        ?RequestOptions $requestOptions = null,
    ): PayoutListResponse;
}
