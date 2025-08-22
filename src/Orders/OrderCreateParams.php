<?php

declare(strict_types=1);

namespace Getivy\Orders;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Orders\OrderCreateParams\Currency;
use Getivy\Orders\OrderCreateParams\Customer;

/**
 * Create a new order. By creating a new order, you will create a new settlement destination which you can use to settle expected incoming payments efficiently. After creating the order, Ivy provides you with a destination for the expected incoming payment. As soon as a payment with the same details arrives, Ivy will update the status of the order.
 */
final class OrderCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The total amount of the order.
     */
    #[Api]
    public float $amount;

    /**
     * The currency code of the order.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * The merchant's unique reference ID for the order.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * The customer of the merchant.
     */
    #[Api(optional: true)]
    public ?Customer $customer;

    /**
     * Optional expiration timestamp in seconds.
     */
    #[Api(optional: true)]
    public ?string $expiresAt;

    /**
     * The subaccount id of the merchant.
     */
    #[Api('subaccountId', optional: true)]
    public ?string $subaccountID;

    /**
     * `new OrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrderCreateParams::with(amount: ..., currency: ..., referenceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OrderCreateParams)
     *   ->withAmount(...)
     *   ->withCurrency(...)
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
     *
     * @param Currency::* $currency
     */
    public static function with(
        float $amount,
        string $currency,
        string $referenceID,
        ?Customer $customer = null,
        ?string $expiresAt = null,
        ?string $subaccountID = null,
    ): self {
        $obj = new self;

        $obj->amount = $amount;
        $obj->currency = $currency;
        $obj->referenceID = $referenceID;

        null !== $customer && $obj->customer = $customer;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $subaccountID && $obj->subaccountID = $subaccountID;

        return $obj;
    }

    /**
     * The total amount of the order.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * The currency code of the order.
     *
     * @param Currency::* $currency
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * The merchant's unique reference ID for the order.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * The customer of the merchant.
     */
    public function withCustomer(Customer $customer): self
    {
        $obj = clone $this;
        $obj->customer = $customer;

        return $obj;
    }

    /**
     * Optional expiration timestamp in seconds.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * The subaccount id of the merchant.
     */
    public function withSubaccountID(string $subaccountID): self
    {
        $obj = clone $this;
        $obj->subaccountID = $subaccountID;

        return $obj;
    }
}
