<?php

declare(strict_types=1);

namespace Getivy\Fx;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Fx\FxRetrieveRateParams\SourceCurrency;
use Getivy\Fx\FxRetrieveRateParams\TargetCurrency;

/**
 * Retrieve the current exchange rate for a given currency pair. The rate is not guaranteed for any following transactions.
 */
final class FxRetrieveRateParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * The source currency code.
     *
     * @var SourceCurrency::* $sourceCurrency
     */
    #[Api(enum: SourceCurrency::class)]
    public string $sourceCurrency;

    /**
     * The target currency code.
     *
     * @var TargetCurrency::* $targetCurrency
     */
    #[Api(enum: TargetCurrency::class)]
    public string $targetCurrency;

    /**
     * The amount of source currency to convert. If not provided, only the rate will be returned. Decimal places should be separated by a dot.
     */
    #[Api(optional: true)]
    public ?string $sourceAmount;

    /**
     * `new FxRetrieveRateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FxRetrieveRateParams::with(sourceCurrency: ..., targetCurrency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FxRetrieveRateParams)->withSourceCurrency(...)->withTargetCurrency(...)
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
     * @param SourceCurrency::* $sourceCurrency
     * @param TargetCurrency::* $targetCurrency
     */
    public static function with(
        string $sourceCurrency,
        string $targetCurrency,
        ?string $sourceAmount = null
    ): self {
        $obj = new self;

        $obj->sourceCurrency = $sourceCurrency;
        $obj->targetCurrency = $targetCurrency;

        null !== $sourceAmount && $obj->sourceAmount = $sourceAmount;

        return $obj;
    }

    /**
     * The source currency code.
     *
     * @param SourceCurrency::* $sourceCurrency
     */
    public function withSourceCurrency(string $sourceCurrency): self
    {
        $obj = clone $this;
        $obj->sourceCurrency = $sourceCurrency;

        return $obj;
    }

    /**
     * The target currency code.
     *
     * @param TargetCurrency::* $targetCurrency
     */
    public function withTargetCurrency(string $targetCurrency): self
    {
        $obj = clone $this;
        $obj->targetCurrency = $targetCurrency;

        return $obj;
    }

    /**
     * The amount of source currency to convert. If not provided, only the rate will be returned. Decimal places should be separated by a dot.
     */
    public function withSourceAmount(string $sourceAmount): self
    {
        $obj = clone $this;
        $obj->sourceAmount = $sourceAmount;

        return $obj;
    }
}
