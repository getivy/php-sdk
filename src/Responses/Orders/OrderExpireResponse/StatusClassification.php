<?php

declare(strict_types=1);

namespace Getivy\Responses\Orders\OrderExpireResponse;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Contracts\BaseModel;
use Getivy\Responses\Orders\OrderExpireResponse\StatusClassification\Primary;
use Getivy\Responses\Orders\OrderExpireResponse\StatusClassification\Secondary;

final class StatusClassification implements BaseModel
{
    use SdkModel;

    /** @var Primary::* $primary */
    #[Api(enum: Primary::class)]
    public string $primary;

    /** @var Secondary::*|null $secondary */
    #[Api(enum: Secondary::class, optional: true)]
    public ?string $secondary;

    /**
     * `new StatusClassification()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatusClassification::with(primary: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatusClassification)->withPrimary(...)
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
     * @param Primary::* $primary
     * @param Secondary::* $secondary
     */
    public static function with(string $primary, ?string $secondary = null): self
    {
        $obj = new self;

        $obj->primary = $primary;

        null !== $secondary && $obj->secondary = $secondary;

        return $obj;
    }

    /**
     * @param Primary::* $primary
     */
    public function withPrimary(string $primary): self
    {
        $obj = clone $this;
        $obj->primary = $primary;

        return $obj;
    }

    /**
     * @param Secondary::* $secondary
     */
    public function withSecondary(string $secondary): self
    {
        $obj = clone $this;
        $obj->secondary = $secondary;

        return $obj;
    }
}
