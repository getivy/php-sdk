<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderNewResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderNewResponse\Destination\BankAccount;

/**
 * The destination bank account and statement reference for the order.
 */
final class Destination implements BaseModel
{
    use SdkModel;

    #[Api]
    public BankAccount $bankAccount;

    /**
     * The bank statement reference of the payment for the order. This is the reference that will be visible on the bank statement.
     */
    #[Api]
    public string $bankStatementReference;

    /**
     * `new Destination()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Destination::with(bankAccount: ..., bankStatementReference: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Destination)->withBankAccount(...)->withBankStatementReference(...)
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
        BankAccount $bankAccount,
        string $bankStatementReference
    ): self {
        $obj = new self;

        $obj->bankAccount = $bankAccount;
        $obj->bankStatementReference = $bankStatementReference;

        return $obj;
    }

    public function withBankAccount(BankAccount $bankAccount): self
    {
        $obj = clone $this;
        $obj->bankAccount = $bankAccount;

        return $obj;
    }

    /**
     * The bank statement reference of the payment for the order. This is the reference that will be visible on the bank statement.
     */
    public function withBankStatementReference(
        string $bankStatementReference
    ): self {
        $obj = clone $this;
        $obj->bankStatementReference = $bankStatementReference;

        return $obj;
    }
}
