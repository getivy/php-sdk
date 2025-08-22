<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\RefundsContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\Refunds\RefundCreateParams;
use Getivy\Refunds\RefundRetrieveParams;
use Getivy\RequestOptions;
use Getivy\Responses\Refunds\RefundGetResponse;
use Getivy\Responses\Refunds\RefundNewResponse;

final class RefundsService implements RefundsContract
{
    public function __construct(private Client $client) {}

    /**
     * Creates a refund for the specified order. The order can be specified either by Ivy's internal `orderId` or by the `referenceId` provided by the merchant during checkout creation. If the refund should only be partial, you can specifiy this with the `amount` parameter.
     *
     * @param float $amount
     * @param string $bankStatementReference An optional custom text that will be shown on the customer's payment reference. Input has to be maximum 16 alpha-numeric characters. If not provided, a default Ivy refund referenceId will be shown.
     * @param string $orderID The internal Ivy id of the order. Must be present in request body if referenceId is not provided
     * @param string $referenceID The external id set by the merchant during checkout creation. Required if orderId is not passed.
     */
    public function create(
        $amount,
        $bankStatementReference = null,
        $orderID = null,
        $referenceID = null,
        ?RequestOptions $requestOptions = null,
    ): RefundNewResponse {
        $args = [
            'amount' => $amount,
            'bankStatementReference' => $bankStatementReference,
            'orderID' => $orderID,
            'referenceID' => $referenceID,
        ];
        $args = Util::array_filter_null(
            $args,
            ['bankStatementReference', 'orderID', 'referenceID']
        );
        [$parsed, $options] = RefundCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/refund/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(RefundNewResponse::class, value: $resp);
    }

    /**
     * Returns refund details and Id of refunded order.
     *
     * @param string $id Id of refund to retrieve details
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): RefundGetResponse {
        $args = ['id' => $id];
        [$parsed, $options] = RefundRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/refund/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(RefundGetResponse::class, value: $resp);
    }
}
