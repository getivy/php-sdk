<?php

declare(strict_types=1);

namespace Getivy\Responses\Banks;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\ListOf;
use Getivy\Responses\Banks\BankSearchResponse\Bank;

final class BankSearchResponse implements BaseModel
{
    use SdkModel;

    /**
     * A list of banks.
     *
     * @var list<Bank> $banks
     */
    #[Api(type: new ListOf(Bank::class))]
    public array $banks;

    /**
     * The total number of banks.
     */
    #[Api]
    public float $count;

    /**
     * Whether there are more banks to retrieve.
     */
    #[Api]
    public bool $hasNext;

    /**
     * The number of banks skipped.
     */
    #[Api]
    public float $skip;

    /**
     * `new BankSearchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BankSearchResponse::with(banks: ..., count: ..., hasNext: ..., skip: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BankSearchResponse)
     *   ->withBanks(...)
     *   ->withCount(...)
     *   ->withHasNext(...)
     *   ->withSkip(...)
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
     * @param list<Bank> $banks
     */
    public static function with(
        array $banks,
        float $count,
        bool $hasNext,
        float $skip
    ): self {
        $obj = new self;

        $obj->banks = $banks;
        $obj->count = $count;
        $obj->hasNext = $hasNext;
        $obj->skip = $skip;

        return $obj;
    }

    /**
     * A list of banks.
     *
     * @param list<Bank> $banks
     */
    public function withBanks(array $banks): self
    {
        $obj = clone $this;
        $obj->banks = $banks;

        return $obj;
    }

    /**
     * The total number of banks.
     */
    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Whether there are more banks to retrieve.
     */
    public function withHasNext(bool $hasNext): self
    {
        $obj = clone $this;
        $obj->hasNext = $hasNext;

        return $obj;
    }

    /**
     * The number of banks skipped.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }
}
