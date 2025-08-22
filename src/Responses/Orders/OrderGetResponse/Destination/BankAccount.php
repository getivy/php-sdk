<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderGetResponse\Destination;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderGetResponse\Destination\BankAccount\BankCode;
use Getivy\Responses\Orders\OrderGetResponse\Destination\BankAccount\Bban;
use Getivy\Responses\Orders\OrderGetResponse\Destination\BankAccount\Iban;
use Getivy\Responses\Orders\OrderGetResponse\Destination\BankAccount\SortCode;
use Getivy\Responses\Orders\OrderGetResponse\Destination\BankAccount\Type;

final class BankAccount implements BaseModel
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
    public ?string $paymentReference;

    #[Api(optional: true)]
    public ?SortCode $sortCode;

    /**
     * `new BankAccount()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BankAccount::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BankAccount)->withType(...)
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
        ?string $paymentReference = null,
        ?SortCode $sortCode = null,
    ): self {
        $obj = new self;

        $obj->type = $type;

        null !== $bankCode && $obj->bankCode = $bankCode;
        null !== $bban && $obj->bban = $bban;
        null !== $iban && $obj->iban = $iban;
        null !== $paymentReference && $obj->paymentReference = $paymentReference;
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

    public function withPaymentReference(string $paymentReference): self
    {
        $obj = clone $this;
        $obj->paymentReference = $paymentReference;

        return $obj;
    }

    public function withSortCode(SortCode $sortCode): self
    {
        $obj = clone $this;
        $obj->sortCode = $sortCode;

        return $obj;
    }
}
