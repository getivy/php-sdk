<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Accounts\AccountListResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Data\Accounts\AccountListResponse\Account\FinancialAddress;

final class Account implements BaseModel
{
    use SdkModel;

    /**
     * The ID of the account.
     */
    #[Api]
    public string $id;

    /**
     * The ID of the bank.
     */
    #[Api('bankId')]
    public string $bankID;

    /**
     * The name of the bank.
     */
    #[Api]
    public string $bankName;

    /**
     * The currency of the account.
     */
    #[Api]
    public string $currency;

    /**
     * Financial address details of the account.
     *
     * @var list<FinancialAddress> $financialAddress
     */
    #[Api(list: FinancialAddress::class)]
    public array $financialAddress;

    /**
     * The name of the account.
     */
    #[Api(optional: true)]
    public ?string $accountName;

    /**
     * `new Account()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Account::with(
     *   id: ..., bankID: ..., bankName: ..., currency: ..., financialAddress: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Account)
     *   ->withID(...)
     *   ->withBankID(...)
     *   ->withBankName(...)
     *   ->withCurrency(...)
     *   ->withFinancialAddress(...)
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
     * @param list<FinancialAddress> $financialAddress
     */
    public static function with(
        string $id,
        string $bankID,
        string $bankName,
        string $currency,
        array $financialAddress,
        ?string $accountName = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->bankID = $bankID;
        $obj->bankName = $bankName;
        $obj->currency = $currency;
        $obj->financialAddress = $financialAddress;

        null !== $accountName && $obj->accountName = $accountName;

        return $obj;
    }

    /**
     * The ID of the account.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The ID of the bank.
     */
    public function withBankID(string $bankID): self
    {
        $obj = clone $this;
        $obj->bankID = $bankID;

        return $obj;
    }

    /**
     * The name of the bank.
     */
    public function withBankName(string $bankName): self
    {
        $obj = clone $this;
        $obj->bankName = $bankName;

        return $obj;
    }

    /**
     * The currency of the account.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * Financial address details of the account.
     *
     * @param list<FinancialAddress> $financialAddress
     */
    public function withFinancialAddress(array $financialAddress): self
    {
        $obj = clone $this;
        $obj->financialAddress = $financialAddress;

        return $obj;
    }

    /**
     * The name of the account.
     */
    public function withAccountName(string $accountName): self
    {
        $obj = clone $this;
        $obj->accountName = $accountName;

        return $obj;
    }
}
