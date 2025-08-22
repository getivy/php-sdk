<?php

declare(strict_types=1);

namespace Getivy\Responses\Fx;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class FxGetRateResponse implements BaseModel
{
    use SdkModel;

    /**
     * The current exchange rate for the given currency pair.
     */
    #[Api]
    public string $rate;

    /**
     * The amount of source currency to convert. Only returned if the source amount is provided.
     */
    #[Api(optional: true)]
    public ?string $sourceAmount;

    /**
     * The amount of the target currency for the given source amount. Only returned if the source amount is provided.
     */
    #[Api(optional: true)]
    public ?string $targetAmount;

    /**
     * `new FxGetRateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FxGetRateResponse::with(rate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FxGetRateResponse)->withRate(...)
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
        string $rate,
        ?string $sourceAmount = null,
        ?string $targetAmount = null
    ): self {
        $obj = new self;

        $obj->rate = $rate;

        null !== $sourceAmount && $obj->sourceAmount = $sourceAmount;
        null !== $targetAmount && $obj->targetAmount = $targetAmount;

        return $obj;
    }

    /**
     * The current exchange rate for the given currency pair.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }

    /**
     * The amount of source currency to convert. Only returned if the source amount is provided.
     */
    public function withSourceAmount(string $sourceAmount): self
    {
        $obj = clone $this;
        $obj->sourceAmount = $sourceAmount;

        return $obj;
    }

    /**
     * The amount of the target currency for the given source amount. Only returned if the source amount is provided.
     */
    public function withTargetAmount(string $targetAmount): self
    {
        $obj = clone $this;
        $obj->targetAmount = $targetAmount;

        return $obj;
    }
}
