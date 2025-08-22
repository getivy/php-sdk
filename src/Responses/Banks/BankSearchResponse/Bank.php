<?php

declare(strict_types=1);

namespace Getivy\Responses\Banks\BankSearchResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Responses\Banks\BankSearchResponse\Bank\Capability;
use Getivy\Responses\Banks\BankSearchResponse\Bank\Currency;
use Getivy\Responses\Banks\BankSearchResponse\Bank\Market;
use Getivy\Responses\Banks\BankSearchResponse\Bank\SupportedPaymentScheme;

final class Bank implements BaseModel
{
    use SdkModel;

    /**
     * Unique identifier of the bank.
     */
    #[Api]
    public string $id;

    /** @var list<Currency::*> $currencies */
    #[Api(type: new ListOf(enum: Currency::class))]
    public array $currencies;

    /**
     * Whether the bank is a default bank.
     */
    #[Api]
    public bool $default;

    /** @var list<Market::*> $market */
    #[Api(type: new ListOf(enum: Market::class))]
    public array $market;

    /**
     * Name of the bank.
     */
    #[Api]
    public string $name;

    /**
     * The payment schemes supported by the bank.
     *
     * @var list<SupportedPaymentScheme::*> $supportedPaymentSchemes
     */
    #[Api(type: new ListOf(enum: SupportedPaymentScheme::class))]
    public array $supportedPaymentSchemes;

    /**
     * Whether the bank is a test bank.
     */
    #[Api]
    public bool $test;

    /**
     * The capabilities of the bank.
     *
     * @var list<Capability::*>|null $capabilities
     */
    #[Api(type: new ListOf(enum: Capability::class), optional: true)]
    public ?array $capabilities;

    #[Api(optional: true)]
    public ?string $group;

    /**
     * The logo in the form of an URL.
     */
    #[Api(optional: true)]
    public ?string $logo;

    /**
     * The URL of the bank's website.
     */
    #[Api(optional: true)]
    public ?string $url;

    /**
     * `new Bank()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Bank::with(
     *   id: ...,
     *   currencies: ...,
     *   default: ...,
     *   market: ...,
     *   name: ...,
     *   supportedPaymentSchemes: ...,
     *   test: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Bank)
     *   ->withID(...)
     *   ->withCurrencies(...)
     *   ->withDefault(...)
     *   ->withMarket(...)
     *   ->withName(...)
     *   ->withSupportedPaymentSchemes(...)
     *   ->withTest(...)
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
     * @param list<Currency::*> $currencies
     * @param list<Market::*> $market
     * @param list<SupportedPaymentScheme::*> $supportedPaymentSchemes
     * @param list<Capability::*>|null $capabilities
     */
    public static function with(
        string $id,
        array $currencies,
        bool $default,
        array $market,
        string $name,
        array $supportedPaymentSchemes,
        bool $test,
        ?array $capabilities = null,
        ?string $group = null,
        ?string $logo = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->currencies = $currencies;
        $obj->default = $default;
        $obj->market = $market;
        $obj->name = $name;
        $obj->supportedPaymentSchemes = $supportedPaymentSchemes;
        $obj->test = $test;

        null !== $capabilities && $obj->capabilities = $capabilities;
        null !== $group && $obj->group = $group;
        null !== $logo && $obj->logo = $logo;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * Unique identifier of the bank.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<Currency::*> $currencies
     */
    public function withCurrencies(array $currencies): self
    {
        $obj = clone $this;
        $obj->currencies = $currencies;

        return $obj;
    }

    /**
     * Whether the bank is a default bank.
     */
    public function withDefault(bool $default): self
    {
        $obj = clone $this;
        $obj->default = $default;

        return $obj;
    }

    /**
     * @param list<Market::*> $market
     */
    public function withMarket(array $market): self
    {
        $obj = clone $this;
        $obj->market = $market;

        return $obj;
    }

    /**
     * Name of the bank.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The payment schemes supported by the bank.
     *
     * @param list<SupportedPaymentScheme::*> $supportedPaymentSchemes
     */
    public function withSupportedPaymentSchemes(
        array $supportedPaymentSchemes
    ): self {
        $obj = clone $this;
        $obj->supportedPaymentSchemes = $supportedPaymentSchemes;

        return $obj;
    }

    /**
     * Whether the bank is a test bank.
     */
    public function withTest(bool $test): self
    {
        $obj = clone $this;
        $obj->test = $test;

        return $obj;
    }

    /**
     * The capabilities of the bank.
     *
     * @param list<Capability::*> $capabilities
     */
    public function withCapabilities(array $capabilities): self
    {
        $obj = clone $this;
        $obj->capabilities = $capabilities;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj->group = $group;

        return $obj;
    }

    /**
     * The logo in the form of an URL.
     */
    public function withLogo(string $logo): self
    {
        $obj = clone $this;
        $obj->logo = $logo;

        return $obj;
    }

    /**
     * The URL of the bank's website.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
