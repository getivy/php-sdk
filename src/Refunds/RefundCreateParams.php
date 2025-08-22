<?php

declare(strict_types=1);

namespace Getivy\Refunds;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Creates a refund for the specified order. The order can be specified either by Ivy's internal `orderId` or by the `referenceId` provided by the merchant during checkout creation. If the refund should only be partial, you can specifiy this with the `amount` parameter.
 */
final class RefundCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    #[Api]
    public float $amount;

    /**
     * An optional custom text that will be shown on the customer's payment reference. Input has to be maximum 16 alpha-numeric characters. If not provided, a default Ivy refund referenceId will be shown.
     */
    #[Api(optional: true)]
    public ?string $bankStatementReference;

    /**
     * The internal Ivy id of the order. Must be present in request body if referenceId is not provided.
     */
    #[Api('orderId', optional: true)]
    public ?string $orderID;

    /**
     * The external id set by the merchant during checkout creation. Required if orderId is not passed.
     */
    #[Api('referenceId', optional: true)]
    public ?string $referenceID;

    /**
     * `new RefundCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RefundCreateParams::with(amount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RefundCreateParams)->withAmount(...)
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
        float $amount,
        ?string $bankStatementReference = null,
        ?string $orderID = null,
        ?string $referenceID = null,
    ): self {
        $obj = new self;

        $obj->amount = $amount;

        null !== $bankStatementReference && $obj->bankStatementReference = $bankStatementReference;
        null !== $orderID && $obj->orderID = $orderID;
        null !== $referenceID && $obj->referenceID = $referenceID;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * An optional custom text that will be shown on the customer's payment reference. Input has to be maximum 16 alpha-numeric characters. If not provided, a default Ivy refund referenceId will be shown.
     */
    public function withBankStatementReference(
        string $bankStatementReference
    ): self {
        $obj = clone $this;
        $obj->bankStatementReference = $bankStatementReference;

        return $obj;
    }

    /**
     * The internal Ivy id of the order. Must be present in request body if referenceId is not provided.
     */
    public function withOrderID(string $orderID): self
    {
        $obj = clone $this;
        $obj->orderID = $orderID;

        return $obj;
    }

    /**
     * The external id set by the merchant during checkout creation. Required if orderId is not passed.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }
}
