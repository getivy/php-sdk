<?php

declare(strict_types=1);

namespace Getivy\Capabilities;

use Getivy\Capabilities\CapabilityRetrieveParams\Market;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve the capabilities of your Ivy account. The capabilities are broken down by market and by product.
 */
final class CapabilityRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /** @var Market::* $market */
    #[Api(enum: Market::class)]
    public string $market;

    /**
     * `new CapabilityRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CapabilityRetrieveParams::with(market: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CapabilityRetrieveParams)->withMarket(...)
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
     * @param Market::* $market
     */
    public static function with(string $market): self
    {
        $obj = new self;

        $obj->market = $market;

        return $obj;
    }

    /**
     * @param Market::* $market
     */
    public function withMarket(string $market): self
    {
        $obj = clone $this;
        $obj->market = $market;

        return $obj;
    }
}
