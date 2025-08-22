<?php

declare(strict_types=1);

namespace Getivy\Checkoutsession\CheckoutsessionCreateParams\Mandate\AdditionalDisplayInformation;

use Getivy\Checkoutsession\CheckoutsessionCreateParams\Mandate\AdditionalDisplayInformation\Price\Currency;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Price implements BaseModel
{
    use SdkModel;

    #[Api]
    public float $amount;

    /** @var Currency::* $currency */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * `new Price()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Price::with(amount: ..., currency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Price)->withAmount(...)->withCurrency(...)
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
    public static function with(float $amount, string $currency): self
    {
        $obj = new self;

        $obj->amount = $amount;
        $obj->currency = $currency;

        return $obj;
    }

    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

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
}
