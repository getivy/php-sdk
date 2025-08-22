<?php

declare(strict_types=1);

namespace Getivy\Responses\Refunds;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Refunds\RefundGetResponse\Currency;
use Getivy\Responses\Refunds\RefundGetResponse\Status;

final class RefundGetResponse implements BaseModel
{
    use SdkModel;

    /**
     * The unique Refund id.
     */
    #[Api]
    public string $id;

    /**
     * The amount of the refund in decimals.
     */
    #[Api]
    public float $amount;

    /**
     * Refund's currency.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * The id of the refunded order.
     */
    #[Api('orderId')]
    public string $orderID;

    /**
     * The current status of this refund.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * `new RefundGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RefundGetResponse::with(
     *   id: ..., amount: ..., currency: ..., orderID: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RefundGetResponse)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withCurrency(...)
     *   ->withOrderID(...)
     *   ->withStatus(...)
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
     * @param Status::* $status
     */
    public static function with(
        string $id,
        float $amount,
        string $currency,
        string $orderID,
        string $status
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->amount = $amount;
        $obj->currency = $currency;
        $obj->orderID = $orderID;
        $obj->status = $status;

        return $obj;
    }

    /**
     * The unique Refund id.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The amount of the refund in decimals.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Refund's currency.
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
     * The id of the refunded order.
     */
    public function withOrderID(string $orderID): self
    {
        $obj = clone $this;
        $obj->orderID = $orderID;

        return $obj;
    }

    /**
     * The current status of this refund.
     *
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
