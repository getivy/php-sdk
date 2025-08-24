<?php

declare(strict_types=1);

namespace Getivy\Responses\Payouts;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Payouts\PayoutListResponse\Item;

final class PayoutListResponse implements BaseModel
{
    use SdkModel;

    #[Api]
    public float $count;

    #[Api]
    public bool $hasNext;

    /** @var list<Item> $items */
    #[Api(list: Item::class)]
    public array $items;

    #[Api]
    public float $skip;

    /**
     * `new PayoutListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayoutListResponse::with(count: ..., hasNext: ..., items: ..., skip: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayoutListResponse)
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

    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    public function withHasNext(bool $hasNext): self
    {
        $obj = clone $this;
        $obj->hasNext = $hasNext;

        return $obj;
    }

    /**
     * @param list<Item> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj->items = $items;

        return $obj;
    }

    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }
}
