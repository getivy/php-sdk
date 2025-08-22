<?php

declare(strict_types=1);

namespace Getivy\Responses\Balance\BalanceGetResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Balance\BalanceGetResponse\Balance\Currency;

final class Balance implements BaseModel
{
    use SdkModel;

    /**
     * The amount of money available on your Ivy account for this currency.
     */
    #[Api]
    public float $available;

    /**
     * The currency of the balance.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * `new Balance()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Balance::with(available: ..., currency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Balance)->withAvailable(...)->withCurrency(...)
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
    public static function with(float $available, string $currency): self
    {
        $obj = new self;

        $obj->available = $available;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * The amount of money available on your Ivy account for this currency.
     */
    public function withAvailable(float $available): self
    {
        $obj = clone $this;
        $obj->available = $available;

        return $obj;
    }

    /**
     * The currency of the balance.
     *
     * @param Currency::* $currency
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }
}
