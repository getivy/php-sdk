<?php

declare(strict_types=1);

namespace Getivy\Responses\Transactions\TransactionListResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * Pagination information.
 */
final class Paging implements BaseModel
{
    use SdkModel;

    /**
     * Whether there are more transactions available.
     */
    #[Api]
    public bool $hasNext;

    /**
     * Cursor for the next page of results.
     */
    #[Api(optional: true)]
    public ?string $nextCursor;

    /**
     * `new Paging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Paging::with(hasNext: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Paging)->withHasNext(...)
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
    public static function with(bool $hasNext, ?string $nextCursor = null): self
    {
        $obj = new self;

        $obj->hasNext = $hasNext;

        null !== $nextCursor && $obj->nextCursor = $nextCursor;

        return $obj;
    }

    /**
     * Whether there are more transactions available.
     */
    public function withHasNext(bool $hasNext): self
    {
        $obj = clone $this;
        $obj->hasNext = $hasNext;

        return $obj;
    }

    /**
     * Cursor for the next page of results.
     */
    public function withNextCursor(string $nextCursor): self
    {
        $obj = clone $this;
        $obj->nextCursor = $nextCursor;

        return $obj;
    }
}
