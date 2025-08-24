<?php

declare(strict_types=1);

namespace Getivy\Responses\Customers;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Customers\CustomerGetResponse\BankAccount;

final class CustomerGetResponse implements BaseModel
{
    use SdkModel;

    /**
     * The id of the customer.
     */
    #[Api]
    public string $id;

    /**
     * Array of bank accounts remembered by user.
     *
     * @var list<BankAccount> $bankAccounts
     */
    #[Api(list: BankAccount::class)]
    public array $bankAccounts;

    /**
     * The email address of the customer.
     */
    #[Api]
    public string $emailAddress;

    /**
     * `new CustomerGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerGetResponse::with(id: ..., bankAccounts: ..., emailAddress: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerGetResponse)
     *   ->withID(...)
     *   ->withBankAccounts(...)
     *   ->withEmailAddress(...)
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
     * @param list<BankAccount> $bankAccounts
     */
    public static function with(
        string $id,
        array $bankAccounts,
        string $emailAddress
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->bankAccounts = $bankAccounts;
        $obj->emailAddress = $emailAddress;

        return $obj;
    }

    /**
     * The id of the customer.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Array of bank accounts remembered by user.
     *
     * @param list<BankAccount> $bankAccounts
     */
    public function withBankAccounts(array $bankAccounts): self
    {
        $obj = clone $this;
        $obj->bankAccounts = $bankAccounts;

        return $obj;
    }

    /**
     * The email address of the customer.
     */
    public function withEmailAddress(string $emailAddress): self
    {
        $obj = clone $this;
        $obj->emailAddress = $emailAddress;

        return $obj;
    }
}
