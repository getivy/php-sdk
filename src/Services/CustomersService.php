<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Client;
use Getivy\Contracts\CustomersContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\Customers\CustomerCreateParams;
use Getivy\Customers\CustomerRetrieveParams;
use Getivy\Customers\CustomerSearchParams;
use Getivy\RequestOptions;
use Getivy\Responses\Customers\CustomerGetResponse;
use Getivy\Responses\Customers\CustomerNewResponse;
use Getivy\Responses\Customers\CustomerSearchResponse;

final class CustomersService implements CustomersContract
{
    public function __construct(private Client $client) {}

    /**
     * Create a new Customer representing your Customers. You can use the Customer to simplify the checkout process for returning journeys.
     *
     * @param string $email The email address of the customer
     */
    public function create(
        $email,
        ?RequestOptions $requestOptions = null
    ): CustomerNewResponse {
        $args = ['email' => $email];
        [$parsed, $options] = CustomerCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/customer/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(CustomerNewResponse::class, value: $resp);
    }

    /**
     * Retrieve a Customer Object by its id.
     *
     * @param string $id The id of the customer
     */
    public function retrieve(
        $id,
        ?RequestOptions $requestOptions = null
    ): CustomerGetResponse {
        $args = ['id' => $id];
        [$parsed, $options] = CustomerRetrieveParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/customer/retrieve',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(CustomerGetResponse::class, value: $resp);
    }

    /**
     * Search for customers you have previously created using filters, e.g. by email.
     *
     * @param string $email Search for customers by email
     * @param float $limit a limit on the number of objects to be returned
     * @param float $skip The number of items to skip
     */
    public function search(
        $email,
        $limit = null,
        $skip = null,
        ?RequestOptions $requestOptions = null
    ): CustomerSearchResponse {
        $args = ['email' => $email, 'limit' => $limit, 'skip' => $skip];
        $args = Util::array_filter_null($args, ['limit', 'skip']);
        [$parsed, $options] = CustomerSearchParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/customer/search',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(CustomerSearchResponse::class, value: $resp);
    }
}
