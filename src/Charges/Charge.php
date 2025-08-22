<?php

declare(strict_types=1);

namespace Getivy\Charges;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Charge implements BaseModel
{
    use SdkModel;

    /**
     * The unique identifier of the created charge.
     */
    #[Api]
    public string $id;

    /**
     * The mandate id used for the charge.
     */
    #[Api('mandateId')]
    public string $mandateID;

    /**
     * The order id associated with the charge.
     */
    #[Api('orderId', optional: true)]
    public mixed $orderID;

    /**
     * The subaccount id used for the charge.
     */
    #[Api('subaccountId', optional: true)]
    public ?string $subaccountID;

    /**
     * `new Charge()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Charge::with(id: ..., mandateID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Charge)->withID(...)->withMandateID(...)
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
        string $id,
        string $mandateID,
        mixed $orderID = null,
        ?string $subaccountID = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->mandateID = $mandateID;

        null !== $orderID && $obj->orderID = $orderID;
        null !== $subaccountID && $obj->subaccountID = $subaccountID;

        return $obj;
    }

    /**
     * The unique identifier of the created charge.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The mandate id used for the charge.
     */
    public function withMandateID(string $mandateID): self
    {
        $obj = clone $this;
        $obj->mandateID = $mandateID;

        return $obj;
    }

    /**
     * The order id associated with the charge.
     */
    public function withOrderID(mixed $orderID): self
    {
        $obj = clone $this;
        $obj->orderID = $orderID;

        return $obj;
    }

    /**
     * The subaccount id used for the charge.
     */
    public function withSubaccountID(string $subaccountID): self
    {
        $obj = clone $this;
        $obj->subaccountID = $subaccountID;

        return $obj;
    }
}
