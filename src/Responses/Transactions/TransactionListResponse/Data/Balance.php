<?php

declare(strict_types=1);

namespace Getivy\Responses\Transactions\TransactionListResponse\Data;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;

/**
 * Balance information.
 */
final class Balance implements BaseModel
{
    use SdkModel;

    /**
     * Balance after the transaction.
     */
    #[Api]
    public string $after;

    /**
     * Balance before the transaction.
     */
    #[Api]
    public string $before;

    /**
     * `new Balance()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Balance::with(after: ..., before: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Balance)->withAfter(...)->withBefore(...)
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
    public static function with(string $after, string $before): self
    {
        $obj = new self;

        $obj->after = $after;
        $obj->before = $before;

        return $obj;
    }

    /**
     * Balance after the transaction.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Balance before the transaction.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }
}
