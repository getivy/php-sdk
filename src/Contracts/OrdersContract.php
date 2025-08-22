<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\Orders\OrderCreateParams\Currency;
use Getivy\Orders\OrderCreateParams\Customer;
use Getivy\RequestOptions;
use Getivy\Responses\Orders\OrderExpireResponse;
use Getivy\Responses\Orders\OrderGetResponse;
use Getivy\Responses\Orders\OrderNewResponse;

interface OrdersContract
{
    /**
     * @param float $amount The total amount of the order
     * @param Currency::* $currency The currency code of the order
     * @param string $referenceID The merchant's unique reference ID for the order
     * @param Customer $customer the customer of the merchant
     * @param string $expiresAt Optional expiration timestamp in seconds
     * @param string $subaccountID the subaccount id of the merchant
     */
    public function create(
        $amount,
        $currency,
        $referenceID,
        $customer = null,
        $expiresAt = null,
        $subaccountID = null,
        ?RequestOptions $requestOptions = null,
    ): OrderNewResponse;

    /**
     * @param string $id You can put in either the Ivy id OR the referenceId of the order
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): OrderGetResponse;

    /**
     * @param string $id You can put in either the Ivy id OR the referenceId of the order
     */
    public function expire(
        $id,
        ?RequestOptions $requestOptions = null
    ): OrderExpireResponse;
}
