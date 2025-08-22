<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\OrdersContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\Orders\OrderCreateParams;
use Getivy\Orders\OrderCreateParams\Currency;
use Getivy\Orders\OrderCreateParams\Customer;
use Getivy\Orders\OrderExpireParams;
use Getivy\Orders\OrderRetrieveParams;
use Getivy\RequestOptions;
use Getivy\Responses\Orders\OrderExpireResponse;
use Getivy\Responses\Orders\OrderGetResponse;
use Getivy\Responses\Orders\OrderNewResponse;

final class OrdersService implements OrdersContract
{
    public function __construct(private Client $client) {}

    /**
     * Create a new order. By creating a new order, you will create a new settlement destination which you can use to settle expected incoming payments efficiently. After creating the order, Ivy provides you with a destination for the expected incoming payment. As soon as a payment with the same details arrives, Ivy will update the status of the order.
     *
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
    ): OrderNewResponse {
        $args = [
            'amount' => $amount,
            'currency' => $currency,
            'referenceID' => $referenceID,
            'customer' => $customer,
            'expiresAt' => $expiresAt,
            'subaccountID' => $subaccountID,
        ];
        $args = Util::array_filter_null(
            $args,
            ['customer', 'expiresAt', 'subaccountID']
        );
        [$parsed, $options] = OrderCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/order/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(OrderNewResponse::class, value: $resp);
    }

    /**
     * Retrieve details of an order. You can retrieve the order by passing either the internal Ivy order id or the `referenceId` you specified when creating a Checkout Session to the `id` field.
     *
     * @param string $id You can put in either the Ivy id OR the referenceId of the order
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): OrderGetResponse {
        $args = ['id' => $id];
        [$parsed, $options] = OrderRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/order/details',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(OrderGetResponse::class, value: $resp);
    }

    /**
     * Manually expire an order before its natural expiration time.
     *
     * @param string $id You can put in either the Ivy id OR the referenceId of the order
     */
    public function expire(
        $id,
        ?RequestOptions $requestOptions = null
    ): OrderExpireResponse {
        $args = ['id' => $id];
        [$parsed, $options] = OrderExpireParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/order/expire',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(OrderExpireResponse::class, value: $resp);
    }
}
