<?php

declare(strict_types=1);

namespace Getivy\Responses\Returns;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Returns\ReturnGetResponse\Currency;
use Getivy\Responses\Returns\ReturnGetResponse\Status;

final class ReturnGetResponse implements BaseModel
{
    use SdkModel;

    /**
     * The ID of the return.
     */
    #[Api]
    public string $id;

    /**
     * The amount of the return.
     */
    #[Api]
    public float $amount;

    /**
     * The date and time the return was created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * The currency of the return.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * The ID of the associated deposit.
     */
    #[Api('depositId')]
    public string $depositID;

    /**
     * The status of the return.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The date and time the return failed if applicable.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $failedAt;

    /**
     * The date and time the return succeeded if applicable.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $succeededAt;

    /**
     * The ID of the resulting return transaction.
     */
    #[Api('transactionId', optional: true)]
    public ?string $transactionID;

    /**
     * `new ReturnGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReturnGetResponse::with(
     *   id: ...,
     *   amount: ...,
     *   createdAt: ...,
     *   currency: ...,
     *   depositID: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReturnGetResponse)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withCreatedAt(...)
     *   ->withCurrency(...)
     *   ->withDepositID(...)
     *   ->withStatus(...)
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
     * @param Currency::* $currency
     * @param Status::* $status
     */
    public static function with(
        string $id,
        float $amount,
        \DateTimeInterface $createdAt,
        string $currency,
        string $depositID,
        string $status,
        ?\DateTimeInterface $failedAt = null,
        ?\DateTimeInterface $succeededAt = null,
        ?string $transactionID = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->amount = $amount;
        $obj->createdAt = $createdAt;
        $obj->currency = $currency;
        $obj->depositID = $depositID;
        $obj->status = $status;

        null !== $failedAt && $obj->failedAt = $failedAt;
        null !== $succeededAt && $obj->succeededAt = $succeededAt;
        null !== $transactionID && $obj->transactionID = $transactionID;

        return $obj;
    }

    /**
     * The ID of the return.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The amount of the return.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * The date and time the return was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The currency of the return.
     *
     * @param Currency::* $currency
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    /**
     * The ID of the associated deposit.
     */
    public function withDepositID(string $depositID): self
    {
        $obj = clone $this;
        $obj->depositID = $depositID;

        return $obj;
    }

    /**
     * The status of the return.
     *
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * The date and time the return failed if applicable.
     */
    public function withFailedAt(\DateTimeInterface $failedAt): self
    {
        $obj = clone $this;
        $obj->failedAt = $failedAt;

        return $obj;
    }

    /**
     * The date and time the return succeeded if applicable.
     */
    public function withSucceededAt(\DateTimeInterface $succeededAt): self
    {
        $obj = clone $this;
        $obj->succeededAt = $succeededAt;

        return $obj;
    }

    /**
     * The ID of the resulting return transaction.
     */
    public function withTransactionID(string $transactionID): self
    {
        $obj = clone $this;
        $obj->transactionID = $transactionID;

        return $obj;
    }
}
