<?php

declare(strict_types=1);

namespace Getivy\Refunds;

use Getivy\Core\Attributes\Api;
use Getivy\Core\Concerns\SdkModel;
use Getivy\Core\Concerns\SdkParams;
use Getivy\Core\Contracts\BaseModel;

/**
 * Returns refund details and Id of refunded order.
 */
final class RefundRetrieveParams implements BaseModel
{
    use SdkModel;
    use SdkParams;

    /**
     * Id of refund to retrieve details.
     */
    #[Api]
    public string $id;

    /**
     * `new RefundRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RefundRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RefundRetrieveParams)->withID(...)
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
     * Id of refund to retrieve details.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
