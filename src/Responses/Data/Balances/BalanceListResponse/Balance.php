<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Balances\BalanceListResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class Balance implements BaseModel
{
    use SdkModel;

    /**
     * The ID of the account.
     */
    #[Api('accountId')]
    public string $accountID;

    /**
     * The available balance.
     */
    #[Api]
    public string $available;

    /**
     * The currency of the balance.
     */
    #[Api]
    public string $currency;

    /**
     * The current balance.
     */
    #[Api]
    public string $current;

    /**
     * The date and time when the balance was last updated.
     */
    #[Api]
    public mixed $timestamp;

    /**
     * `new Balance()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Balance::with(
     *   accountID: ..., available: ..., currency: ..., current: ..., timestamp: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Balance)
     *   ->withAccountID(...)
     *   ->withAvailable(...)
     *   ->withCurrency(...)
     *   ->withCurrent(...)
     *   ->withTimestamp(...)
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
        string $accountID,
        string $available,
        string $currency,
        string $current,
        mixed $timestamp,
    ): self {
        $obj = new self;

        $obj->accountID = $accountID;
        $obj->available = $available;
        $obj->currency = $currency;
        $obj->current = $current;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * The ID of the account.
     */
    public function withAccountID(string $accountID): self
    {
        $obj = clone $this;
        $obj->accountID = $accountID;

        return $obj;
    }

    /**
     * The available balance.
     */
    public function withAvailable(string $available): self
    {
        $obj = clone $this;
        $obj->available = $available;

        return $obj;
    }

    /**
     * The currency of the balance.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * The current balance.
     */
    public function withCurrent(string $current): self
    {
        $obj = clone $this;
        $obj->current = $current;

        return $obj;
    }

    /**
     * The date and time when the balance was last updated.
     */
    public function withTimestamp(mixed $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
