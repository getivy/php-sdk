<?php

declare(strict_types=1);

namespace Getivy\Transactions;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of transactions for the specified time period.
 */
final class TransactionListParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * Start timestamp (inclusive) - unix timestamp.
     */
    #[Api]
    public float $from;

    /**
     * End timestamp (exclusive) - unix timestamp.
     */
    #[Api]
    public float $to;

    /**
     * Cursor for pagination.
     */
    #[Api(optional: true)]
    public ?string $afterCursor;

    /**
     * `new TransactionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransactionListParams::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransactionListParams)->withFrom(...)->withTo(...)
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
    public static function with(
        float $from,
        float $to,
        ?string $afterCursor = null
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

        null !== $afterCursor && $obj->afterCursor = $afterCursor;

        return $obj;
    }

    /**
     * Start timestamp (inclusive) - unix timestamp.
     */
    public function withFrom(float $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * End timestamp (exclusive) - unix timestamp.
     */
    public function withTo(float $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Cursor for pagination.
     */
    public function withAfterCursor(string $afterCursor): self
    {
        $obj = clone $this;
        $obj->afterCursor = $afterCursor;

        return $obj;
    }
}
