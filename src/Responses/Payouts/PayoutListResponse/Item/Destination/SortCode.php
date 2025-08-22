<?php

declare(strict_types=1);

namespace Getivy\Responses\Payouts\PayoutListResponse\Item\Destination;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class SortCode implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $accountHolderName;

    #[Api]
    public string $accountNumber;

    #[Api]
    public string $sortCode;

    /**
     * `new SortCode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SortCode::with(accountHolderName: ..., accountNumber: ..., sortCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SortCode)
     *   ->withAccountHolderName(...)
     *   ->withAccountNumber(...)
     *   ->withSortCode(...)
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
        string $accountHolderName,
        string $accountNumber,
        string $sortCode
    ): self {
        $obj = new self;

        $obj->accountHolderName = $accountHolderName;
        $obj->accountNumber = $accountNumber;
        $obj->sortCode = $sortCode;

        return $obj;
    }

    public function withAccountHolderName(string $accountHolderName): self
    {
        $obj = clone $this;
        $obj->accountHolderName = $accountHolderName;

        return $obj;
    }

    public function withAccountNumber(string $accountNumber): self
    {
        $obj = clone $this;
        $obj->accountNumber = $accountNumber;

        return $obj;
    }

    public function withSortCode(string $sortCode): self
    {
        $obj = clone $this;
        $obj->sortCode = $sortCode;

        return $obj;
    }
}
