<?php

declare(strict_types=1);

namespace Getivy\Charges;

use Getivy\Charges\ChargeCreateParams\Metadata;
use Getivy\Charges\ChargeCreateParams\Price;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Creates a Direct Debit Charge with a valid mandate.
 */
final class ChargeCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * A unique key to ensure the charge is not processed twice.
     */
    #[Api]
    public string $idempotencyKey;

    /**
     * A valid mandate id of the customer's bank account. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    #[Api('mandateId')]
    public string $mandateID;

    /**
     * Additional data to be stored with the charge.
     */
    #[Api]
    public Metadata $metadata;

    /**
     * The price to be charged.
     */
    #[Api]
    public Price $price;

    /**
     * An internal reference id which will be stored with the charge & corresponding order. Needs to be unique per merchant per order and can be up to 200 characters. We recommend to use your internal order id here.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * The subaccount id to be used for the charge.
     */
    #[Api('subaccountId', optional: true)]
    public ?string $subaccountID;

    /**
     * `new ChargeCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargeCreateParams::with(
     *   idempotencyKey: ...,
     *   mandateID: ...,
     *   metadata: ...,
     *   price: ...,
     *   referenceID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChargeCreateParams)
     *   ->withIdempotencyKey(...)
     *   ->withMandateID(...)
     *   ->withMetadata(...)
     *   ->withPrice(...)
     *   ->withReferenceID(...)
     * ```
     */
    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $idempotencyKey,
        string $mandateID,
        Metadata $metadata,
        Price $price,
        string $referenceID,
        ?string $subaccountID = null,
    ): self {
        $obj = new self;

        $obj->idempotencyKey = $idempotencyKey;
        $obj->mandateID = $mandateID;
        $obj->metadata = $metadata;
        $obj->price = $price;
        $obj->referenceID = $referenceID;

        null !== $subaccountID && $obj->subaccountID = $subaccountID;

        return $obj;
    }

    /**
     * A unique key to ensure the charge is not processed twice.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $obj = clone $this;
        $obj->idempotencyKey = $idempotencyKey;

        return $obj;
    }

    /**
     * A valid mandate id of the customer's bank account. This can be retrieved from the `mandate_setup_succeeded` event.
     */
    public function withMandateID(string $mandateID): self
    {
        $obj = clone $this;
        $obj->mandateID = $mandateID;

        return $obj;
    }

    /**
     * Additional data to be stored with the charge.
     */
    public function withMetadata(Metadata $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * The price to be charged.
     */
    public function withPrice(Price $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }

    /**
     * An internal reference id which will be stored with the charge & corresponding order. Needs to be unique per merchant per order and can be up to 200 characters. We recommend to use your internal order id here.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * The subaccount id to be used for the charge.
     */
    public function withSubaccountID(string $subaccountID): self
    {
        $obj = clone $this;
        $obj->subaccountID = $subaccountID;

        return $obj;
    }
}
