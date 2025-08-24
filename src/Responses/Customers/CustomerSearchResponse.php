<?php

declare(strict_types=1);

namespace Getivy\Responses\Customers;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Customers\CustomerSearchResponse\Item;

final class CustomerSearchResponse implements BaseModel
{
    use SdkModel;

    /**
     * The total number of items.
     */
    #[Api]
    public float $count;

    /**
     * Whether there are more items to retrieve.
     */
    #[Api]
    public bool $hasNext;

    /**
     * Array of customer objects matching the search criteria.
     *
     * @var list<Item> $items
     */
    #[Api(list: Item::class)]
    public array $items;

    /**
     * The number of items skipped.
     */
    #[Api]
    public float $skip;

    /**
     * `new CustomerSearchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerSearchResponse::with(count: ..., hasNext: ..., items: ..., skip: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerSearchResponse)
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
     * The total number of items.
     */
    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Whether there are more items to retrieve.
     */
    public function withHasNext(bool $hasNext): self
    {
        $obj = clone $this;
        $obj->hasNext = $hasNext;

        return $obj;
    }

    /**
     * Array of customer objects matching the search criteria.
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
     * The number of items skipped.
     */
    public function withSkip(float $skip): self
    {
        $obj = clone $this;
        $obj->skip = $skip;

        return $obj;
    }
}
