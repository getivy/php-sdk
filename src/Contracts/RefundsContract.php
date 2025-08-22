<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\RequestOptions;
use Getivy\Responses\Refunds\RefundGetResponse;
use Getivy\Responses\Refunds\RefundNewResponse;

interface RefundsContract
{
    /**
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
    ): RefundNewResponse;

    /**
     * @param string $id Id of refund to retrieve details
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): RefundGetResponse;
}
