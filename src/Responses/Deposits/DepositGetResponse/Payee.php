<?php

declare(strict_types=1);

namespace Getivy\Responses\Deposits\DepositGetResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Deposits\DepositGetResponse\Payee\BankCode;
use Getivy\Responses\Deposits\DepositGetResponse\Payee\Bban;
use Getivy\Responses\Deposits\DepositGetResponse\Payee\Iban;
use Getivy\Responses\Deposits\DepositGetResponse\Payee\SortCode;
use Getivy\Responses\Deposits\DepositGetResponse\Payee\Type;

/**
 * The payee account identifier.
 */
final class Payee implements BaseModel
{
    use SdkModel;

    /** @var Type::* $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?BankCode $bankCode;

    #[Api(optional: true)]
    public ?Bban $bban;

    #[Api(optional: true)]
    public ?Iban $iban;

    #[Api(optional: true)]
    public ?SortCode $sortCode;

    /**
     * `new Payee()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payee::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payee)->withType(...)
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
     * @param Type::* $type
     */
    public static function with(
        string $type,
        ?BankCode $bankCode = null,
        ?Bban $bban = null,
        ?Iban $iban = null,
        ?SortCode $sortCode = null,
    ): self {
        $obj = new self;

        $obj->type = $type;

        null !== $bankCode && $obj->bankCode = $bankCode;
        null !== $bban && $obj->bban = $bban;
        null !== $iban && $obj->iban = $iban;
        null !== $sortCode && $obj->sortCode = $sortCode;

        return $obj;
    }

    /**
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withBankCode(BankCode $bankCode): self
    {
        $obj = clone $this;
        $obj->bankCode = $bankCode;

        return $obj;
    }

    public function withBban(Bban $bban): self
    {
        $obj = clone $this;
        $obj->bban = $bban;

        return $obj;
    }

    public function withIban(Iban $iban): self
    {
        $obj = clone $this;
        $obj->iban = $iban;

        return $obj;
    }

    public function withSortCode(SortCode $sortCode): self
    {
        $obj = clone $this;
        $obj->sortCode = $sortCode;

        return $obj;
    }
}
