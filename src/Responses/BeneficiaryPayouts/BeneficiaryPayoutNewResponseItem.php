<?php

declare(strict_types=1);

namespace Getivy\Responses\BeneficiaryPayouts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\BeneficiaryPayouts\BeneficiaryPayoutNewResponseItem\Currency;
use Getivy\Responses\BeneficiaryPayouts\BeneficiaryPayoutNewResponseItem\Status;
use Getivy\Responses\BeneficiaryPayouts\BeneficiaryPayoutNewResponseItem\Type;

final class BeneficiaryPayoutNewResponseItem implements BaseModel
{
    use SdkModel;

    /**
     * The unique identifier of the payout.
     */
    #[Api]
    public string $id;

    /**
     * The payout amount.
     */
    #[Api]
    public float $amount;

    /**
     * The creation timestamp of the payout.
     */
    #[Api]
    public mixed $createdAt;

    /**
     * The currency of the payout.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * Description of the payout.
     */
    #[Api]
    public string $description;

    /**
     * The merchant identifier.
     */
    #[Api]
    public string $merchant;

    /**
     * The reference identifier for the payout.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * The descriptor that appears on bank statements.
     */
    #[Api]
    public string $statementDescriptor;

    /**
     * The current status of the payout.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The type of payout.
     *
     * @var Type::* $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new BeneficiaryPayoutNewResponseItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BeneficiaryPayoutNewResponseItem::with(
     *   id: ...,
     *   amount: ...,
     *   createdAt: ...,
     *   currency: ...,
     *   description: ...,
     *   merchant: ...,
     *   referenceID: ...,
     *   statementDescriptor: ...,
     *   status: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BeneficiaryPayoutNewResponseItem)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withCreatedAt(...)
     *   ->withCurrency(...)
     *   ->withDescription(...)
     *   ->withMerchant(...)
     *   ->withReferenceID(...)
     *   ->withStatementDescriptor(...)
     *   ->withStatus(...)
     *   ->withType(...)
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
     * @param Type::* $type
     */
    public static function with(
        string $id,
        float $amount,
        mixed $createdAt,
        string $currency,
        string $description,
        string $merchant,
        string $referenceID,
        string $statementDescriptor,
        string $status,
        string $type,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->amount = $amount;
        $obj->createdAt = $createdAt;
        $obj->currency = $currency;
        $obj->description = $description;
        $obj->merchant = $merchant;
        $obj->referenceID = $referenceID;
        $obj->statementDescriptor = $statementDescriptor;
        $obj->status = $status;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The unique identifier of the payout.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The payout amount.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * The creation timestamp of the payout.
     */
    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The currency of the payout.
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
     * Description of the payout.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * The merchant identifier.
     */
    public function withMerchant(string $merchant): self
    {
        $obj = clone $this;
        $obj->merchant = $merchant;

        return $obj;
    }

    /**
     * The reference identifier for the payout.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * The descriptor that appears on bank statements.
     */
    public function withStatementDescriptor(string $statementDescriptor): self
    {
        $obj = clone $this;
        $obj->statementDescriptor = $statementDescriptor;

        return $obj;
    }

    /**
     * The current status of the payout.
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
     * The type of payout.
     *
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
