<?php

declare(strict_types=1);

namespace Getivy\Payouts\PayoutCreateParams;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Payouts\PayoutCreateParams\Destination\FinancialAddress;
use Getivy\Payouts\PayoutCreateParams\Destination\Type;

/**
 * The payout destination.
 */
final class Destination implements BaseModel
{
    use SdkModel;

    #[Api(nullable: true, optional: true)]
    public ?FinancialAddress $financialAddress;

    #[Api('orderId', optional: true)]
    public ?string $orderID;

    /** @var Type::*|null $type */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

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
     * @param Type::* $type
     */
    public static function with(
        ?FinancialAddress $financialAddress = null,
        ?string $orderID = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $financialAddress && $obj->financialAddress = $financialAddress;
        null !== $orderID && $obj->orderID = $orderID;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    public function withFinancialAddress(
        ?FinancialAddress $financialAddress
    ): self {
        $obj = clone $this;
        $obj->financialAddress = $financialAddress;

        return $obj;
    }

    public function withOrderID(string $orderID): self
    {
        $obj = clone $this;
        $obj->orderID = $orderID;

        return $obj;
    }

    /**
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
