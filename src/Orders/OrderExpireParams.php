<?php

declare(strict_types=1);

namespace Getivy\Orders;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Manually expire an order before its natural expiration time.
 */
final class OrderExpireParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * You can put in either the Ivy id OR the referenceId of the order.
     */
    #[Api]
    public string $id;

    /**
     * `new OrderExpireParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OrderExpireParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OrderExpireParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    /**
     * You can put in either the Ivy id OR the referenceId of the order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
