<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Charges\Charge;
use Getivy\Charges\ChargeCreateParams\Metadata;
use Getivy\Charges\ChargeCreateParams\Price;
use Getivy\RequestOptions;

interface ChargesContract
{
    /**
     * @param string $idempotencyKey a unique key to ensure the charge is not processed twice
     * @param string $mandateID A valid mandate id of the customer's bank account. This can be retrieved from the `mandate_setup_succeeded` event.
     * @param Metadata $metadata additional data to be stored with the charge
     * @param Price $price the price to be charged
     * @param string $referenceID An internal reference id which will be stored with the charge & corresponding order. Needs to be unique per merchant per order and can be up to 200 characters. We recommend to use your internal order id here.
     * @param string $subaccountID the subaccount id to be used for the charge
     */
    public function create(
        $idempotencyKey,
        $mandateID,
        $metadata,
        $price,
        $referenceID,
        $subaccountID = null,
        ?RequestOptions $requestOptions = null,
    ): Charge;
}
