<?php

declare(strict_types=1);

namespace Getivy\Responses\Webhook\Subscription;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Webhook\Subscription\SubscriptionListResponse\Item;

final class SubscriptionListResponse implements BaseModel
{
    use SdkModel;

    /**
     * The total number of webhook subscriptions.
     */
    #[Api]
    public float $count;

    /**
     * Whether there are more webhook subscriptions to retrieve.
     */
    #[Api]
    public bool $hasNext;

    /**
     * Array of webhook subscription objects.
     *
     * @var list<Item> $items
     */
    #[Api(list: Item::class)]
    public array $items;

    /**
     * The number of webhook subscriptions skipped.
     */
    #[Api]
    public float $skip;

    /**
     * `new SubscriptionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionListResponse::with(count: ..., hasNext: ..., items: ..., skip: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionListResponse)
     *   ->withCount(...)
     *   ->withHasNext(...)
     *   ->withItems(...)
     *   ->withSkip(...)
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
     * @param list<Item> $items
     */
    public static function with(
        float $count,
        bool $hasNext,
        array $items,
        float $skip
    ): self {
        $obj = new self;

        $obj->count = $count;
        $obj->hasNext = $hasNext;
        $obj->items = $items;
        $obj->skip = $skip;

        return $obj;
    }

    /**
     * The total number of webhook subscriptions.
     */
    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Whether there are more webhook subscriptions to retrieve.
     */
    public function withHasNext(bool $hasNext): self
    {
        $obj = clone $this;
        $obj->hasNext = $hasNext;

        return $obj;
    }

    /**
     * Array of webhook subscription objects.
     *
     * @param list<Item> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj->items = $items;

        return $obj;
    }

    /**
     * The number of webhook subscriptions skipped.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }
}
