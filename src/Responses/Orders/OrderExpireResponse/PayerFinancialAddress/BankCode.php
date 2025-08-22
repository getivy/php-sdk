<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse\PayerFinancialAddress;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

final class BankCode implements BaseModel
{
    use SdkModel;

    #[Api]
    public string $accountNumber;

    #[Api]
    public string $code;

    #[Api(optional: true)]
    public ?string $accountHolderName;

    /**
     * `new BankCode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BankCode::with(accountNumber: ..., code: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BankCode)->withAccountNumber(...)->withCode(...)
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
        string $accountNumber,
        string $code,
        ?string $accountHolderName = null
    ): self {
        $obj = new self;

        $obj->accountNumber = $accountNumber;
        $obj->code = $code;

        null !== $accountHolderName && $obj->accountHolderName = $accountHolderName;

        return $obj;
    }

    public function withAccountNumber(string $accountNumber): self
    {
        $obj = clone $this;
        $obj->accountNumber = $accountNumber;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    public function withAccountHolderName(string $accountHolderName): self
    {
        $obj = clone $this;
        $obj->accountHolderName = $accountHolderName;

        return $obj;
    }
}
