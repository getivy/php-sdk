<?php

declare(strict_types=1);

namespace Getivy\Banks;

use Getivy\Banks\BankListParams\Capability;
use Getivy\Banks\BankListParams\Currency;
use Getivy\Banks\BankListParams\Market;
use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Get a list of banks. You can filter by group, capability and market.
 */
final class BankListParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * Filter banks with provided capability only. `ais` for data products, `pis` for payment products.
     *
     * @var Capability::*|null $capability
     */
    #[Api(enum: Capability::class, optional: true)]
    public ?string $capability;

    /**
     * ISO 4217 currency code. Filter banks with provided currency only.
     *
     * @var Currency::*|null $currency
     */
    #[Api(enum: Currency::class, optional: true)]
    public ?string $currency;

    /**
     * If provided the list will show banks in this group only. Groups are e.g. "Sparkasse", i.e. a group of different bank branches of the same brand.
     */
    #[Api(optional: true)]
    public ?string $group;

    /**
     * The maximum number of banks to return (default 1000).
     */
    #[Api(optional: true)]
    public ?float $limit;

    /**
     * ISO 3166-1 alpha-2 country code. Filter banks with provided market only.
     *
     * @var Market::*|null $market
     */
    #[Api(enum: Market::class, optional: true)]
    public ?string $market;

    /**
     * The internal checkout session id. For internal use only.
     */
    #[Api('sessionId', optional: true)]
    public mixed $sessionID;

    /**
     * The number of banks to skip.
     */
    #[Api(optional: true)]
    public ?float $skip;

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
     * @param Capability::*|null $capability
     * @param Currency::*|null $currency
     * @param Market::*|null $market
     */
    public static function with(
        ?string $capability = null,
        ?string $currency = null,
        ?string $group = null,
        ?float $limit = null,
        ?string $market = null,
        mixed $sessionID = null,
        ?float $skip = null,
    ): self {
        $obj = new self;

        null !== $capability && $obj->capability = $capability;
        null !== $currency && $obj->currency = $currency;
        null !== $group && $obj->group = $group;
        null !== $limit && $obj->limit = $limit;
        null !== $market && $obj->market = $market;
        null !== $sessionID && $obj->sessionID = $sessionID;
        null !== $skip && $obj->skip = $skip;

        return $obj;
    }

    /**
     * Filter banks with provided capability only. `ais` for data products, `pis` for payment products.
     *
     * @param Capability::* $capability
     */
    public function withCapability(string $capability): self
    {
        $obj = clone $this;
        $obj->capability = $capability;

        return $obj;
    }

    /**
     * ISO 4217 currency code. Filter banks with provided currency only.
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
     * If provided the list will show banks in this group only. Groups are e.g. "Sparkasse", i.e. a group of different bank branches of the same brand.
     */
    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    /**
     * The maximum number of banks to return (default 1000).
     */
    public function withLimit(float $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code. Filter banks with provided market only.
     *
     * @param Market::* $market
     */
    public function withMarket(string $market): self
    {
        $obj = clone $this;
        $obj->market = $market;

        return $obj;
    }

    /**
     * The internal checkout session id. For internal use only.
     */
    public function withSessionID(mixed $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }

    /**
     * The number of banks to skip.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }
}
