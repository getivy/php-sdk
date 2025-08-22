<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderExpireResponse\Refund\Status;

final class Refund implements BaseModel
{
    use SdkModel;

    /**
     * The unique id of this refund request.
     */
    #[Api]
    public string $id;

    /**
     * The amount of the refund in decimals.
     */
    #[Api]
    public float $amount;

    #[Api]
    public mixed $createdAt;

    /**
     * The unique id of this refund request. This can be set when requesting the refund.
     */
    #[Api('referenceId')]
    public string $referenceID;

    /**
     * The current status of this refund.
     *
     * @var Status::* $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api]
    public mixed $updatedAt;

    /**
     * The description of the refund.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * `new Refund()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Refund::with(
     *   id: ...,
     *   amount: ...,
     *   createdAt: ...,
     *   referenceID: ...,
     *   status: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Refund)
     *   ->withID(...)
     *   ->withAmount(...)
     *   ->withCreatedAt(...)
     *   ->withReferenceID(...)
     *   ->withStatus(...)
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
     * @param Status::* $status
     */
    public static function with(
        string $id,
        float $amount,
        mixed $createdAt,
        string $referenceID,
        string $status,
        mixed $updatedAt,
        ?string $description = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->amount = $amount;
        $obj->createdAt = $createdAt;
        $obj->referenceID = $referenceID;
        $obj->status = $status;
        $obj->updatedAt = $updatedAt;

        null !== $description && $obj->description = $description;

        return $obj;
    }

    /**
     * The unique id of this refund request.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The amount of the refund in decimals.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The unique id of this refund request. This can be set when requesting the refund.
     */
    public function withReferenceID(string $referenceID): self
    {
        $obj = clone $this;
        $obj->referenceID = $referenceID;

        return $obj;
    }

    /**
     * The current status of this refund.
     *
     * @param Status::* $status
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withUpdatedAt(mixed $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The description of the refund.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
