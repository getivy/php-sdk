<?php

declare(strict_types=1);

namespace Getivy\Responses\Data\Transactions\TransactionListResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Data\Transactions\TransactionListResponse\Data\Balance;
use Getivy\Responses\Data\Transactions\TransactionListResponse\Data\Creditor;
use Getivy\Responses\Data\Transactions\TransactionListResponse\Data\Debtor;
use Getivy\Responses\Data\Transactions\TransactionListResponse\Data\Side;

final class Data implements BaseModel
{
    use SdkModel;

    /**
     * Transaction identifier.
     */
    #[Api]
    public string $id;

    /**
     * Amount of the transaction.
     */
    #[Api]
    public string $amount;

    /**
     * Balance information.
     */
    #[Api]
    public Balance $balance;

    /**
     * Bank statement reference.
     */
    #[Api]
    public string $bankStatementReference;

    /**
     * Creditor account details.
     */
    #[Api]
    public Creditor $creditor;

    /**
     * ISO 4217 currency code.
     */
    #[Api]
    public string $currency;

    /**
     * Debtor account details.
     */
    #[Api]
    public Debtor $debtor;

    /**
     * Side of the transaction.
     *
     * @var Side::* $side
     */
    #[Api(enum: Side::class)]
    public string $side;

    /**
     * Transaction date as unix timestamp.
     */
    #[Api]
    public float $transactionDate;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   amount: ...,
     *   balance: ...,
     *   bankStatementReference: ...,
     *   creditor: ...,
     *   currency: ...,
     *   debtor: ...,
     *   side: ...,
     *   transactionDate: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withBalance(...)
     *   ->withBankStatementReference(...)
     *   ->withCreditor(...)
     *   ->withCurrency(...)
     *   ->withDebtor(...)
     *   ->withSide(...)
     *   ->withTransactionDate(...)
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
     * @param Side::* $side
     */
    public static function with(
        string $id,
        string $amount,
        Balance $balance,
        string $bankStatementReference,
        Creditor $creditor,
        string $currency,
        Debtor $debtor,
        string $side,
        float $transactionDate,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->amount = $amount;
        $obj->balance = $balance;
        $obj->bankStatementReference = $bankStatementReference;
        $obj->creditor = $creditor;
        $obj->currency = $currency;
        $obj->debtor = $debtor;
        $obj->side = $side;
        $obj->transactionDate = $transactionDate;

        return $obj;
    }

    /**
     * Transaction identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Amount of the transaction.
     */
    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Balance information.
     */
    public function withBalance(Balance $balance): self
    {
        $obj = clone $this;
        $obj->balance = $balance;

        return $obj;
    }

    /**
     * Bank statement reference.
     */
    public function withBankStatementReference(
        string $bankStatementReference
    ): self {
        $obj = clone $this;
        $obj->bankStatementReference = $bankStatementReference;

        return $obj;
    }

    /**
     * Creditor account details.
     */
    public function withCreditor(Creditor $creditor): self
    {
        $obj = clone $this;
        $obj->creditor = $creditor;

        return $obj;
    }

    /**
     * ISO 4217 currency code.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * Debtor account details.
     */
    public function withDebtor(Debtor $debtor): self
    {
        $obj = clone $this;
        $obj->debtor = $debtor;

        return $obj;
    }

    /**
     * Side of the transaction.
     *
     * @param Side::* $side
     */
    public function withSide(string $side): self
    {
        $obj = clone $this;
        $obj->side = $side;

        return $obj;
    }

    /**
     * Transaction date as unix timestamp.
     */
    public function withTransactionDate(float $transactionDate): self
    {
        $obj = clone $this;
        $obj->transactionDate = $transactionDate;

        return $obj;
    }
}
