<?php

declare(strict_types=1);

namespace Getivy\Charges\ChargeCreateParams;

use Getivy\Charges\ChargeCreateParams\Price\Currency;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * The price to be charged.
 */
final class Price implements BaseModel
{
    use SdkModel;

    /** @var Currency::* $currency */
    #[Api(enum: Currency::class)]
    public string $currency;

    #[Api]
    public float $total;

    #[Api(optional: true)]
    public ?float $shipping;

    #[Api(optional: true)]
    public ?float $subTotal;

    #[Api(optional: true)]
    public ?float $totalNet;

    #[Api(optional: true)]
    public ?float $vat;

    /**
     * `new Price()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Price::with(currency: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Price)->withCurrency(...)->withTotal(...)
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
        string $currency,
        float $total,
        ?float $shipping = null,
        ?float $subTotal = null,
        ?float $totalNet = null,
        ?float $vat = null,
    ): self {
        $obj = new self;

        $obj->currency = $currency;
        $obj->total = $total;

        null !== $shipping && $obj->shipping = $shipping;
        null !== $subTotal && $obj->subTotal = $subTotal;
        null !== $totalNet && $obj->totalNet = $totalNet;
        null !== $vat && $obj->vat = $vat;

        return $obj;
    }

    /**
     * @param Currency::* $currency
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    public function withTotal(float $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    public function withShipping(float $shipping): self
    {
        $obj = clone $this;
        $obj->shipping = $shipping;

        return $obj;
    }

    public function withSubTotal(float $subTotal): self
    {
        $obj = clone $this;
        $obj->subTotal = $subTotal;

        return $obj;
    }

    public function withTotalNet(float $totalNet): self
    {
        $obj = clone $this;
        $obj->totalNet = $totalNet;

        return $obj;
    }

    public function withVat(float $vat): self
    {
        $obj = clone $this;
        $obj->vat = $vat;

        return $obj;
    }
}
