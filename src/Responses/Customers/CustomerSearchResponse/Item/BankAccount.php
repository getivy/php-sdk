<?php

declare(strict_types=1);

namespace Getivy\Responses\Customers\CustomerSearchResponse\Item;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Customers\CustomerSearchResponse\Item\BankAccount\Bank;

final class BankAccount implements BaseModel
{
    use SdkModel;

    /**
     * Remembered bank details.
     */
    #[Api]
    public Bank $bank;

    /**
     * Last 4 digits of remembered account number.
     */
    #[Api]
    public string $last4digits;

    /**
     * `new BankAccount()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BankAccount::with(bank: ..., last4digits: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BankAccount)->withBank(...)->withLast4digits(...)
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
    public static function with(Bank $bank, string $last4digits): self
    {
        $obj = new self;

        $obj->bank = $bank;
        $obj->last4digits = $last4digits;

        return $obj;
    }

    /**
     * Remembered bank details.
     */
    public function withBank(Bank $bank): self
    {
        $obj = clone $this;
        $obj->bank = $bank;

        return $obj;
    }

    /**
     * Last 4 digits of remembered account number.
     */
    public function withLast4digits(string $last4digits): self
    {
        $obj = clone $this;
        $obj->last4digits = $last4digits;

        return $obj;
    }
}
