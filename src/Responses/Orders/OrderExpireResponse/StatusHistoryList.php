<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderExpireResponse\StatusHistoryList\CurrentStatus;
use Getivy\Responses\Orders\OrderExpireResponse\StatusHistoryList\PreviousStatus;
use Getivy\Responses\Orders\OrderExpireResponse\StatusHistoryList\Reason;

final class StatusHistoryList implements BaseModel
{
    use SdkModel;

    #[Api]
    public mixed $createdAt;

    /** @var CurrentStatus::* $currentStatus */
    #[Api(enum: CurrentStatus::class)]
    public string $currentStatus;

    /** @var Reason::* $reason */
    #[Api(enum: Reason::class)]
    public string $reason;

    #[Api]
    public mixed $updatedAt;

    /** @var PreviousStatus::*|null $previousStatus */
    #[Api(enum: PreviousStatus::class, nullable: true, optional: true)]
    public ?string $previousStatus;

    /**
     * `new StatusHistoryList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusHistoryList::with(
     *   createdAt: ..., currentStatus: ..., reason: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusHistoryList)
     *   ->withCreatedAt(...)
     *   ->withCurrentStatus(...)
     *   ->withReason(...)
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
     * @param CurrentStatus::* $currentStatus
     * @param Reason::* $reason
     * @param PreviousStatus::*|null $previousStatus
     */
    public static function with(
        mixed $createdAt,
        string $currentStatus,
        string $reason,
        mixed $updatedAt,
        ?string $previousStatus = null,
    ): self {
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->currentStatus = $currentStatus;
        $obj->reason = $reason;
        $obj->updatedAt = $updatedAt;

        null !== $previousStatus && $obj->previousStatus = $previousStatus;

        return $obj;
    }

    public function withCreatedAt(mixed $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param CurrentStatus::* $currentStatus
     */
    public function withCurrentStatus(string $currentStatus): self
    {
        $obj = clone $this;
        $obj->currentStatus = $currentStatus;

        return $obj;
    }

    /**
     * @param Reason::* $reason
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    public function withUpdatedAt(mixed $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * @param PreviousStatus::*|null $previousStatus
     */
    public function withPreviousStatus(?string $previousStatus): self
    {
        $obj = clone $this;
        $obj->previousStatus = $previousStatus;

        return $obj;
    }
}
