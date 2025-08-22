<?php

declare(strict_types=1);

namespace Getivy\Payouts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Core\Conversion\MapOf;
use Getivy\Payouts\Payout\Currency;
use Getivy\Payouts\Payout\Destination;
use Getivy\Payouts\Payout\Status;
use Getivy\Payouts\Payout\Type;

final class Payout implements BaseModel
{
    use SdkModel;

    /**
     * The payout ID.
     */
    #[Api]
    public string $id;

    /**
     * The payout amount.
     */
    #[Api]
    public float $amount;

    /**
     * The payout created at.
     */
    #[Api]
    public mixed $createdAt;

    /**
     * The payout currency.
     *
     * @var Currency::* $currency
     */
    #[Api(enum: Currency::class)]
    public string $currency;

    /**
     * The payout destination.
     */
    #[Api]
    public Destination $destination;

    /**
     * The payout status.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The payout type.
     *
     * @var Type::* $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The payout updated at.
     */
    #[Api]
    public mixed $updatedAt;

    /**
     * The payout metadata.
     *
     * @var array<string, mixed>|null $metadata
     */
    #[Api(type: new MapOf('string'), optional: true)]
    public ?array $metadata;

    /**
     * The payout payment reference.
     */
    #[Api(optional: true)]
    public ?string $paymentReference;

    /**
     * `new Payout()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payout::with(
     *   id: ...,
     *   amount: ...,
     *   createdAt: ...,
     *   currency: ...,
     *   destination: ...,
     *   status: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payout)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withCreatedAt(...)
     *   ->withCurrency(...)
     *   ->withDestination(...)
     *   ->withStatus(...)
     *   ->withType(...)
     *   ->withUpdatedAt(...)
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
     * @param array<string, mixed>|null $metadata
     */
    public static function with(
        string $id,
        float $amount,
        mixed $createdAt,
        string $currency,
        Destination $destination,
        string $status,
        string $type,
        mixed $updatedAt,
        ?array $metadata = null,
        ?string $paymentReference = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->amount = $amount;
        $obj->createdAt = $createdAt;
        $obj->currency = $currency;
        $obj->destination = $destination;
        $obj->status = $status;
        $obj->type = $type;
        $obj->updatedAt = $updatedAt;

        null !== $metadata && $obj->metadata = $metadata;
        null !== $paymentReference && $obj->paymentReference = $paymentReference;

        return $obj;
    }

    /**
     * The payout ID.
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
     * The payout created at.
     */
    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The payout currency.
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
     * The payout destination.
     */
    public function withDestination(Destination $destination): self
    {
        $obj = clone $this;
        $obj->destination = $destination;

        return $obj;
    }

    /**
     * The payout status.
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
     * The payout type.
     *
     * @param Type::* $type
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The payout updated at.
     */
    public function withUpdatedAt(mixed $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The payout metadata.
     *
     * @param array<string, mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * The payout payment reference.
     */
    public function withPaymentReference(string $paymentReference): self
    {
        $obj = clone $this;
        $obj->paymentReference = $paymentReference;

        return $obj;
    }
}
