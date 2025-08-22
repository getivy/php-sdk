<?php

declare(strict_types=1);

namespace Getivy\Contracts;

use Getivy\RequestOptions;
use Getivy\Responses\Customers\CustomerGetResponse;
use Getivy\Responses\Customers\CustomerNewResponse;
use Getivy\Responses\Customers\CustomerSearchResponse;

interface CustomersContract
{
    /**
     * @param string $email The email address of the customer
     */
    public function create(
        $email,
        ?RequestOptions $requestOptions = null
    ): CustomerNewResponse;

    /**
     * @param string $id The id of the customer
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): CustomerGetResponse;

    /**
     * @param string $email Search for customers by email
     * @param float $limit a limit on the number of objects to be returned
     * @param float $skip The number of items to skip
     */
    public function search(
        $email,
        $limit = null,
        $skip = null,
        ?RequestOptions $requestOptions = null,
    ): CustomerSearchResponse;
}
