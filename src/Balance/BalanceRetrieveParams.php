<?php

declare(strict_types=1);

namespace Getivy\Balance;

use Getivy\Balance\BalanceRetrieveParams\Currency;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve the balance of your Ivy account. The balance is the money currently available on your Ivy account. It is broken down by currency.
 */
final class BalanceRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The currency to retrieve the balance for.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * `new BalanceRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BalanceRetrieveParams::with(currency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BalanceRetrieveParams)->withCurrency(...)
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
    public static function with(string $currency): self
    {
        $obj = new self;

        $obj->currency = $currency;

        return $obj;
    }

    /**
     * The currency to retrieve the balance for.
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
