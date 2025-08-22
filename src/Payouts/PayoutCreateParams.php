<?php

declare(strict_types=1);

namespace Getivy\Payouts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\MapOf;
use Getivy\Payouts\PayoutCreateParams\Currency;
use Getivy\Payouts\PayoutCreateParams\Destination;

/**
 * Create a payout for a merchant.
 */
final class PayoutCreateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The payout amount in decimal format. The minimum amount is 0.01.
     */
    #[Api]
    public float $amount;

    /**
     * The payout currency.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * The payout destination.
     */
    #[Api]
    public Destination $destination;

    /**
     * This can be used to store any additional information you need to associate with this payout.
     *
     * @var array<string, mixed>|null $metadata
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $metadata;

    /**
     * The payout payment reference. This is visible to the receiving party, if possible.
     */
    #[Api(optional: true)]
    public ?string $paymentReference;

    /**
     * `new PayoutCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayoutCreateParams::with(amount: ..., currency: ..., destination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayoutCreateParams)
     *   ->withAmount(...)
     *   ->withCurrency(...)
     *   ->withDestination(...)
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
     * @param array<string, mixed>|null $metadata
     */
    public static function with(
        float $amount,
        string $currency,
        Destination $destination,
        ?array $metadata = null,
        ?string $paymentReference = null,
    ): self {
        $obj = new self;

        $obj->amount = $amount;
        $obj->currency = $currency;
        $obj->destination = $destination;

        null !== $metadata && $obj->metadata = $metadata;
        null !== $paymentReference && $obj->paymentReference = $paymentReference;

        return $obj;
    }

    /**
     * The payout amount in decimal format. The minimum amount is 0.01.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * The payout currency.
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
     * The payout destination.
     */
    public function withDestination(Destination $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    /**
     * This can be used to store any additional information you need to associate with this payout.
     *
     * @param array<string, mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * The payout payment reference. This is visible to the receiving party, if possible.
     */
    public function withPaymentReference(string $paymentReference): self
    {
        $obj = clone $this;
        $obj->paymentReference = $paymentReference;

        return $obj;
    }
}
