<?php

declare(strict_types=1);

namespace Getivy\Refunds;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Refunds\Refund\OrderStatus;
use Getivy\Refunds\Refund\RefundStatus;

final class Refund implements BaseModel
{
    use SdkModel;

    #[Api('orderId')]
    public string $orderID;

    /** @var OrderStatus::* $orderStatus */
    #[Api(enum: OrderStatus::class)]
    public string $orderStatus;

    #[Api('referenceId')]
    public string $referenceID;

    /** @var RefundStatus::* $refundStatus */
    #[Api(enum: RefundStatus::class)]
    public string $refundStatus;

    /**
     * `new Refund()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Refund::with(
     *   orderID: ..., orderStatus: ..., referenceID: ..., refundStatus: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Refund)
     *   ->withOrderID(...)
     *   ->withOrderStatus(...)
     *   ->withReferenceID(...)
     *   ->withRefundStatus(...)
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
     * @param OrderStatus::* $orderStatus
     * @param RefundStatus::* $refundStatus
     */
    public static function with(
        string $orderID,
        string $orderStatus,
        string $referenceID,
        string $refundStatus,
    ): self {
        $obj = new self;

        $obj->orderID = $orderID;
        $obj->orderStatus = $orderStatus;
        $obj->referenceID = $referenceID;
        $obj->refundStatus = $refundStatus;

        return $obj;
    }

    public function withOrderID(string $orderID): self
    {
        $obj = clone $this;
        $obj->orderID = $orderID;

        return $obj;
    }

    /**
     * @param OrderStatus::* $orderStatus
     */
    public function withOrderStatus(string $orderStatus): self
    {
        $obj = clone $this;
        $obj->orderStatus = $orderStatus;

        return $obj;
    }

    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * @param RefundStatus::* $refundStatus
     */
    public function withRefundStatus(string $refundStatus): self
    {
        $obj = clone $this;
        $obj->refundStatus = $refundStatus;

        return $obj;
    }
}
