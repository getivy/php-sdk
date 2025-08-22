<?php

declare(strict_types=1);

namespace Getivy\Services;

use Getivy\Charges\Charge;
use Getivy\Charges\ChargeCreateParams;
use Getivy\Charges\ChargeCreateParams\Metadata;
use Getivy\Charges\ChargeCreateParams\Price;
use Getivy\Client;
use Getivy\Contracts\ChargesContract;
use Getivy\Core\Conversion;
use Getivy\Core\Util;
use Getivy\RequestOptions;

final class ChargesService implements ChargesContract
{
    public function __construct(private Client $client) {}

    /**
     * Creates a Direct Debit Charge with a valid mandate.
     *
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
    ): Charge {
        $args = [
            'idempotencyKey' => $idempotencyKey,
            'mandateID' => $mandateID,
            'metadata' => $metadata,
            'price' => $price,
            'referenceID' => $referenceID,
            'subaccountID' => $subaccountID,
        ];
        $args = Util::array_filter_null($args, ['subaccountID']);
        [$parsed, $options] = ChargeCreateParams::parseRequest(
            $args,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'api/service/charge/create',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Charge::class, value: $resp);
    }
}
